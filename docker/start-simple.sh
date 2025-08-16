#!/bin/bash

echo "Starting Laravel application..."

# Install Composer dependencies
echo "Installing Composer dependencies..."
composer install --no-interaction --optimize-autoloader

# Generate application key if not exists
if [ ! -f .env ]; then
    echo "Creating .env file..."
    cp .env.example .env
    php artisan key:generate
fi

# Set proper permissions
echo "Setting permissions..."
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Clear and cache config
echo "Clearing and caching config..."
php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan route:cache
php artisan view:clear
php artisan view:cache

# Start PHP-FPM
echo "Starting PHP-FPM..."
php-fpm
