#!/bin/bash

# Set up Laravel on first container start
if [ ! -f ".env" ]; then
    cp .env.example .env
    composer install
    npm install
    npm run build
    php artisan key:generate
    php artisan migrate --seed
fi

# Run Laravel dev server
php artisan serve --host=0.0.0.0 --port=8000
