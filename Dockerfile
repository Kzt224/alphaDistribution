# Use PHP 8.2.12 base image with FPM
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
    curl \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php \
    -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js (LTS)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist
RUN composer require doctrine/dbal

# Install Node dependencies (needed for build)
RUN npm install

# Expose port for Laravel dev server
EXPOSE 8080

# Start the server and run missing steps on container start
CMD npm run build && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=8080
