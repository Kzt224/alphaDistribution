# Use PHP 8.2.12 image
FROM php:8.2.12-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the Laravel application into the container
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist
RUN composer require doctrine/dbal

# Generate session migration only if not exists
RUN sh -c '[ -z "$(ls database/migrations/*_create_sessions_table.php 2>/dev/null)" ] && php artisan session:table || echo "Session table migration already exists"'

# Run all migrations
RUN php artisan migrate --force

# Expose the port
EXPOSE 8080

# Start Laravel dev server
CMD php artisan serve --host 0.0.0.0 --port 8080
