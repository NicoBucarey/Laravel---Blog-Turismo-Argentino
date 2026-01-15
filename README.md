# 🇦🇷 Explorando Argentina - Blog de Turismo

Un blog turístico desarrollado en Laravel que muestra los destinos más increíbles de Argentina, organizados por regiones como la Patagonia, el Litoral, el Norte y más.

[![Laravel](https://img.shields.io/badge/Laravel-10-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-blue.svg)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-orange.svg)](https://mysql.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-3.0-38B2AC.svg)](https://tailwindcss.com)

## 🌟 Demo en Vivo

**URL:** [https://laravel-blog-turismo-argentino-production.up.railway.app](https://laravel-blog-turismo-argentino-production.up.railway.app)

## 📋 Descripción

"Explorando Argentina" es una plataforma web que invita a recorrer las maravillas de Argentina. El blog presenta lugares destacados, recomendaciones, fotos y mucha inspiración para tu próxima aventura por territorio argentino.

### Características Principales

- 🗺️ **Regiones Turísticas**: Contenido organizado por regiones geográficas
- 📝 **Sistema de Posts**: Gestión completa de artículos turísticos
- 🏷️ **Categorización**: Sistema de categorías para organizar contenido
- 📱 **Diseño Responsive**: Optimizado para dispositivos móviles y desktop
- 🔐 **Autenticación**: Sistema de usuarios con registro y login
- 🖼️ **Gestión de Imágenes**: Subida y manejo de imágenes para posts
- ⚡ **Performance Optimizada**: Caché de vistas y configuración

## 🛠️ Stack Tecnológico

- **Backend**: Laravel 10
- **Frontend**: Blade Templates + Tailwind CSS + Vite
- **Base de Datos**: MySQL 8.0
- **Autenticación**: Laravel Breeze
- **Deployment**: Railway
- **Imágenes**: Laravel Storage + Intervention Image

## 📁 Estructura del Proyecto

```
blog/
├── app/
│   ├── Http/Controllers/     # Controladores
│   ├── Models/              # Modelos Eloquent (Post, Category, User)
│   ├── Providers/           # Service Providers
│   └── Services/           # ImageService para manejo de imágenes
├── database/
│   ├── migrations/         # Migraciones de DB
│   └── seeders/           # Seeders con datos de ejemplo
├── resources/
│   ├── views/             # Templates Blade
│   ├── css/              # Estilos Tailwind
│   └── js/               # JavaScript
├── routes/
│   └── web.php           # Rutas web
└── public/
    └── storage/          # Almacenamiento público de imágenes
```

## 🚀 Instalación Local

### Prerrequisitos

- PHP 8.1 o superior
- Composer
- Node.js & npm
- MySQL
- Git

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/NicoBucarey/Laravel---Blog-Turismo-Argentino.git
   cd Laravel---Blog-Turismo-Argentino
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Instalar dependencias de Node.js**
   ```bash
   npm install
   ```

4. **Configurar variables de entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configurar base de datos en `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=blog_turismo
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_password
   ```

6. **Ejecutar migraciones y seeders**
   ```bash
   php artisan migrate --seed
   ```

7. **Crear enlace simbólico para storage**
   ```bash
   php artisan storage:link
   ```

8. **Compilar assets**
   ```bash
   npm run dev
   ```

9. **Iniciar servidor de desarrollo**
   ```bash
   php artisan serve
   ```

## 🌐 Deployment en Railway

### Configuración de Variables de Entorno

```env
APP_NAME="Explorando Argentina"
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:tu_app_key_aqui
APP_URL=https://tu-dominio.up.railway.app

# Base de datos (se configuran automáticamente con Railway MySQL)
DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}
```

### Comandos de Deployment (Procfile)

```
web: php artisan storage:link && php artisan migrate --force && php artisan db:seed --force && php artisan config:cache && php artisan view:cache && php artisan serve --host=0.0.0.0 --port=$PORT
```

## 📚 Uso

### Navegación Principal

- **Inicio**: Página principal con mosaico de imágenes turísticas
- **Iniciar Sesión**: Autenticación de usuarios
- **Registrarse**: Registro de nuevos usuarios
- **Ver Regiones Turísticas**: Explorar contenido por categorías

### Panel de Administración

Una vez autenticado, los usuarios pueden:
- Crear nuevos posts turísticos
- Subir y gestionar imágenes
- Categorizar contenido
- Editar información del perfil

## 🎨 Diseño

- **Tipografía**: Playfair Display (títulos) + Open Sans (contenido)
- **Colores**: Esquema inspirado en los colores de Argentina
- **Layout**: Diseño responsive con Tailwind CSS
- **UX**: Interfaz intuitiva con navegación clara

## 🔧 Comandos Útiles

```bash
# Limpiar cachés
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Recompilar assets
npm run build

# Ejecutar tests
php artisan test

# Generar nueva clave de aplicación
php artisan key:generate
```

## 🤝 Contribuir

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -m 'Add: nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

## 📝 Licencia

Este proyecto está bajo la licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 👨‍💻 Autor

**Nico Bucarey**
- GitHub: [@NicoBucarey](https://github.com/NicoBucarey)

---

⭐ ¡Si te gusta este proyecto, dale una estrella en GitHub!

## 📞 Soporte

Si tienes algún problema o pregunta, puedes:
- Abrir un issue en GitHub
- Contactarme directamente

---

*Desarrollado con ❤️ en Argentina*

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
