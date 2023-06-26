#!/usr/bin/env bash
echo 'Running script: 00-laravel-deploy.sh'
echo 'Running composer'
composer install --no-dev --working-dir=/var/www/html

echo 'Caching config...'
php artisan config:cache

echo 'Caching routes...'
php artisan route:cache

if [[ $SEED_DB ]]; then
    echo 'Running migrations with seeding...'
    php artisan migrate:refresh --seed --force
else
    echo 'Running migrations...'
    php artisan migrate --force
fi
