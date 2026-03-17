# 🇦🇷 Explorando Argentina

Blog turístico hecho con Laravel para publicar destinos de Argentina, organizados por categorías y con imágenes.

[![Laravel](https://img.shields.io/badge/Laravel-11-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-orange.svg)](https://mysql.com)

## ✨ Funcionalidades

- Autenticación de usuarios (Laravel Breeze)
- CRUD de posts turísticos
- Categorías para organizar contenido
- Subida y gestión de imágenes
- UI responsive con Blade + Tailwind

## 🛠️ Stack

- Laravel 11
- PHP 8.2+
- MySQL
- Blade + Tailwind + Vite
- Intervention Image

## 🚀 Ejecutar en local

### Requisitos

- PHP 8.2+
- Composer
- Node.js + npm
- MySQL

### Setup rápido

```bash
git clone https://github.com/NicoBucarey/Laravel---Blog-Turismo-Argentino.git
cd Laravel---Blog-Turismo-Argentino

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Configura tu base en `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=
```

Luego ejecuta:

```bash
php artisan migrate --seed
php artisan storage:link
npm run build
php artisan serve
```

## 🌐 Deploy en Railway

1. Conecta el repositorio en Railway.
2. Agrega una base de datos MySQL en el proyecto.
3. Configura variables de entorno:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://<tu-app>.up.railway.app

DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}
```

4. Comando de start recomendado:

```bash
php artisan migrate --force && php artisan config:cache && php artisan view:cache && php artisan serve --host=0.0.0.0 --port=$PORT
```

## 🔧 Comandos útiles

```bash
php artisan test
php artisan optimize:clear
npm run build
```

## 👨‍💻 Autor

Nico Bucarey  
GitHub: [@NicoBucarey](https://github.com/NicoBucarey)
