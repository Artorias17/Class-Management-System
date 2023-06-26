#! /bin/bash

if [ ! -f "/etc/docker" ]; then
    echo "Running Composer Install"
    composer install --no-interaction
fi

if [ ! -f ".env" ]; then
    cp .env.example .env
    echo "Created env file from .env.example"
else
    echo "env file already exists."
fi

echo "Running Artisan Migrate"
php artisan migrate
echo "Running Artisan App Key Generation"
php artisan key:generate
echo "Clearing cache"
php artisan cache:clear
echo "Clearing config"
php artisan config:clear
echo "Clearing route"
php artisan route:clear
echo "Starting PHP Server"

# Traffic from outside of container (host) needs to reach this server
# php artisan serve uses default port of 8000
php artisan serve --host=0.0.0.0 --env=.env
# Running the default entrypoint
exec docker-php-entrypoint "$@"
