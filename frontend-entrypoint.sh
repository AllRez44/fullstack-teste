#!/bin/bash
cd /app
if [ ! -d "vendor" ] || [ -z "$(ls -A vendor)" ]; then
    echo "Installing PHP dependencies..."
    composer install --no-interaction --prefer-dist --optimize-autoloader || { echo "Composer install failed"; exit 1; }
    echo "Generating App Key"
    php artisan key:generate
    echo "Running migrations"
    php artisan db:monitor && \
     sleep 3 && \
      php artisan migrate && \
      php artisan db:seed

else
    echo "PHP dependencies already installed."
fi

echo Install Node.js dependencies if not already installed
if [ ! -d "node_modules" ] || [ -z "$(ls -A node_modules)" ]; then
    echo "Installing Node.js dependencies..."
    npm install --no-interaction || { echo "NPM install failed"; exit 1; }
else
    echo "Node.js dependencies already installed."
fi
php artisan serve --host=0.0.0.0 --port 8000