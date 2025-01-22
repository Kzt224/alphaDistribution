# Use the official PHP image with Composer pre-installed
FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpq-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql

# Set the working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Install the doctrine/dbal package
RUN composer require doctrine/dbal

# Copy the entrypoint script
COPY entrypoint.sh /usr/local/bin/

# Make the entrypoint script executable
RUN chmod +x /usr/local/bin/entrypoint.sh

# Expose the application port
EXPOSE 8080

# Use the entrypoint script
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
