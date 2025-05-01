#!/bin/bash

# Wait until database is ready
echo "Waiting for database..."
until php artisan migrate:status > /dev/null 2>&1; do
    sleep 3
done

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Start Laravel dev server
php artisan serve --host 0.0.0.0 --port 8080
