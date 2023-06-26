#!/usr/bin/env bash
echo 'Running script: 00-laravel-deploy.sh'
echo 'Running composer'
composer install --no-dev --working-dir=/var/www/html

echo 'Caching config...'
php artisan config:cache

echo 'Caching routes...'
php artisan route:cache

if [[ "$SEED_DB" == "1" || "$SEED_DB" == "true" ]]; then
    php artisan migrate:refresh --seed --force
else
    php artisan migrate --force
fi
