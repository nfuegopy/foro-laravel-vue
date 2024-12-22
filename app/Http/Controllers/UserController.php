<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $api;

    public function __construct()
    {
        $this->api = new ApiHelper('users');
    }

    /**
     * Mostrar lista de usuarios
     */
    public function listar()
    {
        try {
            $endpoint = $this->api->getEndpoint('list');
            Log::info('Solicitando lista de usuarios');
            
            $response = $this->api->get();
            return view('users.index', [
                'endpoint' => $endpoint,
                'usuarios' => $response->json()
            ]);
        } catch (\Exception $e) {
            Log::error('Error al listar usuarios', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error al cargar usuarios');
        }
    }

    /**
     * Guardar nuevo usuario (rol por defecto: 1 - admin)
     */
    public function guardarCliente(Request $request)
    {
        Log::info('Iniciando guardarCliente', [
            'status' => 'START',
            'action' => 'Guardar nuevo cliente',
            'data_recibida' => $request->all()
        ]);
    
        try {
            // Validación
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|max:50',
                'email' => 'required|email|max:100',
                'password_hash' => 'required|string|min:6'
            ]);
    
            if ($validator->fails()) {
                Log::warning('Validación fallida', [
                    'status' => 'FAIL',
                    'action' => 'Validar datos del cliente',
                    'errores' => $validator->errors()->toArray()
                ]);
    
                return response()->json([
                    'error' => 'Datos inválidos',
                    'detalles' => $validator->errors()->toArray()
                ], 422);
            }
    
            // Datos a enviar
            $datos = $request->all();
            $datos['role_id'] = 1;
    
            Log::info('Validación exitosa', [
                'status' => 'SUCCESS',
                'action' => 'Validar datos del cliente',
                'datos_validados' => collect($datos)->except(['password_hash'])->toArray()
            ]);
    
            // Llamada a la API
            $response = $this->api->post('', $datos);
    
            Log::info('Petición a la API completada', [
                'status' => $response->successful() ? 'SUCCESS' : 'FAIL',
                'action' => 'Guardar cliente en la API',
                'response_status' => $response->status(),
                'response_body' => $response->json()
            ]);
    
            return response()->json($response->json(), $response->status());
    
        } catch (\Exception $e) {
            Log::error('Error en guardarCliente', [
                'status' => 'FAIL',
                'action' => 'Guardar cliente',
                'mensaje_error' => $e->getMessage(),
                'linea' => $e->getLine(),
                'archivo' => $e->getFile()
            ]);
    
            return response()->json([
                'error' => 'Error al crear usuario',
                'mensaje' => $e->getMessage()
            ], 500);
        }
    }
    

    /**
     * Guardar nuevo usuario (rol especificado)
     */
    public function guardar(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|max:50',
                'email' => 'required|email|max:100',
                'password_hash' => 'required|string|min:6',
                'role_id' => 'required|integer'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Datos inválidos',
                    'detalles' => $validator->errors()
                ], 422);
            }

            $response = $this->api->post('', $request->all());
            return response()->json($response->json(), $response->status());
        } catch (\Exception $e) {
            Log::error('Error al guardar usuario', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al crear usuario'], 500);
        }
    }

    /**
     * Obtener un usuario específico
     */
    public function obtener($id)
    {
        try {
            if (!is_numeric($id)) {
                return response()->json(['error' => 'ID inválido'], 400);
            }

            $response = $this->api->get("/{$id}");
            return response()->json($response->json(), $response->status());
        } catch (\Exception $e) {
            Log::error('Error al obtener usuario', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al obtener usuario'], 500);
        }
    }

    /**
     * Actualizar usuario existente
     */
    public function actualizar(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'username' => 'sometimes|string|max:50',
                'email' => 'sometimes|email|max:100',
                'password_hash' => 'sometimes|string|min:6',
                'role_id' => 'sometimes|integer'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Datos inválidos',
                    'detalles' => $validator->errors()
                ], 422);
            }

            $response = $this->api->patch("/{$id}", $request->all());
            return response()->json($response->json(), $response->status());
        } catch (\Exception $e) {
            Log::error('Error al actualizar usuario', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al actualizar usuario'], 500);
        }
    }

    /**
     * Eliminar usuario
     */
    public function eliminar($id)
    {
        try {
            if (!is_numeric($id)) {
                return response()->json(['error' => 'ID inválido'], 400);
            }

            $response = $this->api->delete("/{$id}");
            return response()->json($response->json(), $response->status());
        } catch (\Exception $e) {
            Log::error('Error al eliminar usuario', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Error al eliminar usuario'], 500);
        }
    }

    /**
     * Mostrar formulario de creación
     */
    public function crear()
    {
        return view('users.create', [
            'endpoint' => $this->api->getEndpoint('create')
        ]);
    }

    /**
     * Mostrar formulario de edición
     */
    public function editar($id)
    {
        try {
            $response = $this->api->get("/{$id}");
            return view('users.edit', [
                'endpoint' => $this->api->getEndpoint('update'),
                'usuario' => $response->json()
            ]);
        } catch (\Exception $e) {
            Log::error('Error al cargar formulario de edición', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error al cargar usuario');
        }
    }
}