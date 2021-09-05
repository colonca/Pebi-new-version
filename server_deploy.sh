#!/bin/sh
set -e

echo "Deploying application ..."

cd /var/wwww

# Update codebase
git fetch origin master
git reset --hard origin/master

docker exec -ti pebi-app bash

# Enter maintenance mode
(php artisan down --message 'The app is being (quickly!) updated. Please try again in a minute.') || true

    # Install dependencies based on lock file
    composer install --no-interaction --prefer-dist --optimize-autoloader

    # Migrate database
    php artisan migrate --force

    # Clear cache
    php artisan optimize

# Exit maintenance mode
php artisan up

echo "Application deployed!"