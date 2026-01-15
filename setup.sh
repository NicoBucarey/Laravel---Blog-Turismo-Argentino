#!/bin/bash

# Ejecutar una sola vez para configurar Railway
echo "🚀 Setting up Laravel for Railway..."

# Crear enlace de storage (solo si no existe)
if [ ! -L public/storage ]; then
    echo "📁 Creating storage link..."
    php artisan storage:link
else
    echo "✅ Storage link already exists"
fi

# Ejecutar seeders (solo si la tabla posts está vacía)
POST_COUNT=$(php artisan tinker --execute="echo App\\Models\\Post::count();")
if [ "$POST_COUNT" -eq "0" ]; then
    echo "🌱 Seeding database..."
    php artisan db:seed --force
else
    echo "✅ Database already seeded"
fi

echo "🎉 Setup complete!"