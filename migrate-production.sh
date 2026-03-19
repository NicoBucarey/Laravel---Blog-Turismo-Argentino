#!/bin/bash
cd /app || exit 1
php artisan migrate --force
