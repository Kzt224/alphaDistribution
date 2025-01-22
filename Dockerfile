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
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy only necessary files
COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www

# Add the doctrine/dbal package (optional, only if you need it)
RUN composer require doctrine/dbal

# Expose the port (8080)
EXPOSE 8080

# Use php-fpm instead of `php artisan serve` for production
CMD ["php-fpm"]
