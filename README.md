# Proyecto Laravel con Vue.js y Docker

Este proyecto está construido con **Laravel**, **Vue.js** y utiliza **Docker** para simplificar la configuración del entorno de desarrollo.

## Requisitos previos

Asegúrate de tener instalados los siguientes programas en tu máquina:
- **Docker** (https://www.docker.com/)
- **Git** (https://git-scm.com/)

## Clonar el repositorio

Clona este repositorio en tu máquina local:

```bash
git clone [https://github.com/<tu-usuario>/<nombre-repositorio>.git](https://github.com/nfuegopy/foro-laravel-vue)
cd foro-laravel-vue
```

## Configurar y levantar el proyecto

### 1. Construir los contenedores con Docker

Ejecuta el siguiente comando para crear los contenedores necesarios:

```bash
curl -s https://laravel.build/example-app | bash
./vendor/bin/sail up -d
```

### 2. Instalar las dependencias de PHP y Node.js

Una vez que los contenedores estén levantados, instala las dependencias necesarias:

```bash
./vendor/bin/sail composer install
./vendor/bin/sail npm install
```

### 3. Copiar el archivo de entorno

Crea una copia del archivo `.env.example` y ajústalo si es necesario:

```bash
cp .env.example .env
```

### 4. Generar la clave de la aplicación

Genera la clave única de la aplicación con:

```bash
./vendor/bin/sail artisan key:generate
```

### 5. Ejecutar migraciones (opcional)

Si el proyecto requiere una base de datos y tiene migraciones, ejecútalas con:

```bash
./vendor/bin/sail artisan migrate
```

### 6. Compilar los activos frontend

Compila los archivos CSS y JavaScript:

```bash
./vendor/bin/sail npm run dev
```

Para producción, usa:

```bash
./vendor/bin/sail npm run build
```

## Acceder al proyecto

### 1. URL del proyecto

Una vez que los contenedores estén levantados, el proyecto estará disponible en:

```
http://localhost
```

### 2. Credenciales predeterminadas (si aplican)
- Usuario: `admin@example.com`
- Contraseña: `password`

## Comandos Útiles

### Levantar contenedores
```bash
./vendor/bin/sail up -d
```

### Detener contenedores
```bash
./vendor/bin/sail down
```

### Ejecutar comandos dentro del contenedor
Por ejemplo, ejecutar `artisan` o `composer`:

```bash
./vendor/bin/sail artisan migrate
./vendor/bin/sail composer install
```

## Contribuir

Si deseas contribuir a este proyecto:

1. Haz un fork del repositorio
2. Crea una rama con tu funcionalidad (`git checkout -b feature/nueva-funcionalidad`)
3. Haz commit de tus cambios (`git commit -m 'Agregar nueva funcionalidad'`)
4. Haz push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

## Licencia

Este proyecto está bajo la Licencia MIT.

---

¡Gracias por usar este proyecto! Si tienes alguna duda o sugerencia, no dudes en abrir un issue.

### Ajustes Personalizados

1. Reemplaza `<tu-usuario>` y `<nombre-repositorio>` con el nombre de tu cuenta de GitHub y el nombre del repositorio
2. Si hay credenciales o datos específicos (como servicios externos), incluye esa información en el README.md

### Utiliza el .env base de docker para levantarlo
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:dGY9wwwsE1cf6EZYoqNDk9vKalzsyknAUK9+MnUeZB0=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_SCHEME=null
MAIL_HOST=mailpit
MAIL_PORT=1025                                                                       
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"

SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://meilisearch:7700

MEILISEARCH_NO_ANALYTICS=false




Como levantar en docker
paso 03 - docker run --rm --interactive --tty -v $(pwd):/app composer install   
paso 04 - ./vendor/bin/sail up --build  
paso 05 - ./vendor/bin/sail npm install  
paso 06 - ./vendor/bin/sail npm run dev  
paso 07 - ./vendor/bin/sail npm run build  

paso 08 - verificar migraciones BD mysql  
paso 09 - levantar el proyecto  con ./vendor/bin/sail up --d  
paso 10 - ejecutar migraciones en caso de que solicite
