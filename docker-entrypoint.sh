#!/bin/bash
# Docker entrypoint script
# Written by Matteo Salonia (matteo@salonia.it) https://salonia.it

# Clear cache & Regenerate key
php artisan optimize:clear
php artisan key:generate --force

# Cache assets
composer cache

# Execute php-fpm
php-fpm
