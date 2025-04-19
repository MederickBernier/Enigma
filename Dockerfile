FROM php:8.3-fpm

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Install Composer (latest version)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy custom PHP config
COPY ./docker/php.ini /usr/local/etc/php/

# Set working directory
WORKDIR /var/www
