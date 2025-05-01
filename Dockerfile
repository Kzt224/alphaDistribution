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

# Ensure .env is set correctly (you can also mount or build it manually)
RUN echo "SESSION_DRIVER=database" >> .env

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist
RUN composer require doctrine/dbal

# Create the sessions table if migration file exists
# (skip if already created)
RUN if [ ! -f database/migrations/*_create_sessions_table.php ]; then php artisan session:table; fi

# Run migrations (includes sessions table)
RUN php artisan migrate --force

# Expose the port
EXPOSE 8080

# Start Laravel dev server
CMD php artisan serve --host 0.0.0.0 --port 8080
