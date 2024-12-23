# 🚀 Foro Project - Laravel + Vue

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Vue.js](https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vue.js&logoColor=4FC08D)
![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

## 📋 Tabla de Contenidos

- [Descripción](#-descripción)
- [Requisitos Previos](#-requisitos-previos)
- [Configuración del Entorno](#-configuración-del-entorno)
- [Instrucciones de Instalación](#-instrucciones-de-instalación)
- [Variables de Entorno](#-variables-de-entorno)
- [Comandos Útiles](#-comandos-útiles)

## 📝 Descripción

Foro es una aplicación web moderna construida con Laravel y Vue.js, diseñada para proporcionar una plataforma de discusión robusta y escalable. El proyecto utiliza Docker para garantizar un entorno de desarrollo consistente y fácil de configurar.

## 💻 Requisitos Previos

Asegúrate de tener instalado:

- Docker Desktop
- Git
- Composer
- Node.js (recomendado v16 o superior)

## 🛠 Configuración del Entorno

1. **Clonar el Repositorio**
   ```bash
   git clone https://github.com/nfuegopy/foro.git
   cd foro
   ```

2. **Copiar el Archivo de Entorno**
   ```bash
   cp .env.example .env
   ```

## 🚀 Instrucciones de Instalación

Sigue estos pasos en orden para configurar el proyecto:

### 1️⃣ Instalar Dependencias de Composer
```bash
docker run --rm --interactive --tty -v $(pwd):/app composer install
```

### 2️⃣ Levantar Contenedores Docker
```bash
./vendor/bin/sail up --build
```

### 3️⃣ Instalar Dependencias de Node
```bash
./vendor/bin/sail npm install
```

### 4️⃣ Compilar Assets (Desarrollo)
```bash
./vendor/bin/sail npm run dev
```

### 5️⃣ Compilar Assets (Producción)
```bash
./vendor/bin/sail npm run build
```

### 6️⃣ Configurar Base de Datos
```bash
# Verificar migraciones
./vendor/bin/sail artisan migrate:status

# Ejecutar migraciones
./vendor/bin/sail artisan migrate
```

### 7️⃣ Levantar el Proyecto
```bash
./vendor/bin/sail up -d
```

## 🔐 Variables de Entorno

Las principales variables de entorno que necesitas configurar:

```env
# Aplicación
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:dGY9wwwsE1cf6EZYoqNDk9vKalzsyknAUK9+MnUeZB0=
APP_DEBUG=true
APP_URL=http://localhost

# API
API_FORO={url de la api}

# Base de Datos
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

[Ver archivo .env completo](#) para más detalles.

## 🛠 Comandos Útiles

### Gestión de Contenedores
```bash
# Iniciar contenedores
./vendor/bin/sail up

# Detener contenedores
./vendor/bin/sail down

# Ver logs
./vendor/bin/sail logs
```

### Comandos de Laravel
```bash
# Limpiar caché
./vendor/bin/sail artisan cache:clear

# Crear un nuevo controlador
./vendor/bin/sail artisan make:controller NombreController

# Ejecutar pruebas
./vendor/bin/sail artisan test
```

### Comandos de NPM
```bash
# Desarrollo
./vendor/bin/sail npm run dev

# Producción
./vendor/bin/sail npm run build

# Watch
./vendor/bin/sail npm run watch
```

## 🤝 Contribución

Las contribuciones son bienvenidas. Por favor, asegúrate de:

1. Fork el repositorio
2. Crear una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abrir un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 🙋‍♂️ Soporte

Si tienes alguna pregunta o encuentras algún problema, por favor abre un issue en el repositorio.

---

⭐️ **¿Te gusta el proyecto? ¡Dale una estrella!** ⭐️

