# -----------------------------------------
# APLICACIÓN
# -----------------------------------------
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:dGY9wwwsE1cf6EZYoqNDk9vKalzsyknAUK9+MnUeZB0=
APP_DEBUG=true
APP_URL=http://localhost
APP_TIMEZONE=UTC
APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US
APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

# -----------------------------------------
# API CONFIGURACIÓN
# -----------------------------------------
API_FORO={url de la api}
PHP_CLI_SERVER_WORKERS=4

# -----------------------------------------
# SEGURIDAD
# -----------------------------------------
BCRYPT_ROUNDS=12

# -----------------------------------------
# LOGGING
# -----------------------------------------
LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

# -----------------------------------------
# BASE DE DATOS
# -----------------------------------------
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password

# -----------------------------------------
# SESIÓN
# -----------------------------------------
SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

# -----------------------------------------
# SISTEMA
# -----------------------------------------
BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
CACHE_STORE=database
CACHE_PREFIX=

# -----------------------------------------
# SERVICIOS
# -----------------------------------------
MEMCACHED_HOST=127.0.0.1

# Redis
REDIS_CLIENT=phpredis
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

# -----------------------------------------
# EMAIL
# -----------------------------------------
MAIL_MAILER=smtp
MAIL_SCHEME=null
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

# -----------------------------------------
# AWS
# -----------------------------------------
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

# -----------------------------------------
# FRONTEND
# -----------------------------------------
VITE_APP_NAME="${APP_NAME}"

# -----------------------------------------
# BÚSQUEDA
# -----------------------------------------
SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://meilisearch:7700
MEILISEARCH_NO_ANALYTICS=false

# -----------------------------------------
# INSTRUCCIONES DE LEVANTAMIENTO (Docker)
# -----------------------------------------
# 1. Instalar dependencias de Composer:
#    docker run --rm --interactive --tty -v $(pwd):/app composer install
#
# 2. Levantar contenedores:
#    ./vendor/bin/sail up --build
#
# 3. Instalar dependencias de Node:
#    ./vendor/bin/sail npm install
#
# 4. Compilar assets para desarrollo:
#    ./vendor/bin/sail npm run dev
#
# 5. Compilar assets para producción:
#    ./vendor/bin/sail npm run build
#
# 6. Verificar migraciones BD mysql
#
# 7. Levantar proyecto en modo detached:
#    ./vendor/bin/sail up -d
#
# 8. Ejecutar migraciones si es necesario:
#    ./vendor/bin/sail artisan migrate
