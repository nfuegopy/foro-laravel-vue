<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiHelper
{
    protected $baseUrl;
    protected $endpoint;
    protected $endpoints;

    public function __construct($module)
    {
        $this->baseUrl = config('app.api_foro');
        $this->endpoint = $module;
        $this->endpoints = [
            'list' => ['url' => '', 'method' => 'GET'],
            'create' => ['url' => '', 'method' => 'POST'],
            'get' => ['url' => '/{id}', 'method' => 'GET'],
            'update' => ['url' => '/{id}', 'method' => 'PATCH'],
            'delete' => ['url' => '/{id}', 'method' => 'DELETE']
        ];
    }

    public function getEndpoint($action)
    {
        $endpoint = $this->endpoints[$action];
        return [
            'url' => $this->baseUrl . $this->endpoint . $endpoint['url'],
            'method' => $endpoint['method']
        ];
    }

    public function get($path = '', $params = [])
    {
        return $this->request('GET', $path, $params);
    }

    public function post($path = '', $data = [])
    {
        return $this->request('POST', $path, $data);
    }

    public function patch($path = '', $data = [])
    {
        return $this->request('PATCH', $path, $data);
    }

    public function delete($path = '')
    {
        return $this->request('DELETE', $path);
    }

    protected function request($method, $path, $data = null)
    {
        try {
            $url = $this->baseUrl . $this->endpoint . $path;
            Log::info("API Request", [
                'method' => $method,
                'url' => $url,
                'module' => $this->endpoint
            ]);

            $response = Http::$method($url, $data);
            return $response;
        } catch (\Exception $e) {
            Log::error("API Error", [
                'method' => $method,
                'url' => $url,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }
}