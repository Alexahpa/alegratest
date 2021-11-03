FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        git \
        libzip-dev \
        zip \
    && docker-php-ext-install zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql mysqli

# Set working directory
WORKDIR /var/www/kitchen

ENV WORKER_MEMORY_LIMIT_MB 128

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www/kitchen

# Copy existing application directory permissions
COPY --chown=www:www . /var/www/kitchen

RUN mkdir /var/www/kitchen/vendor/
RUN chown www:www /var/www/kitchen/vendor

# Change current user to www
USER www

RUN composer install --no-autoloader --no-scripts --no-dev

RUN composer dump-autoload --optimize

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]
