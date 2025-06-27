# Setup PHP-FPM
FROM php:8.4.8-fpm-alpine AS base

# Tell php-fpm to listen on a Unix domain socket
# instead of a TCP socket, thus achieving faster performance
RUN sed -i "s/listen = 9000/listen = \/var\/run\/php-fpm.sock/" /usr/local/etc/php-fpm.d/zz-docker.conf
RUN echo "listen.owner = www-data" | tee -a /usr/local/etc/php-fpm.d/zz-docker.conf
RUN echo "listen.group = www-data" | tee -a /usr/local/etc/php-fpm.d/zz-docker.conf
RUN echo "listen.mode = 0660" | tee -a /usr/local/etc/php-fpm.d/zz-docker.conf

# Install system dependencies
# bash -> used to execute the docker-entrypoint script
# fcgi -> used to test FastCGI connectivity
# linux-headers -> required by PHP sockets extension
# npm -> required to build & bundle assets
RUN apk add --no-cache bash fcgi linux-headers npm

# Install PHP extensions
RUN docker-php-ext-install sockets

# Install redis PHP extension
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && pecl install redis \
    && docker-php-ext-enable redis

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/salonia.it

# Copy app files
COPY --chown=www-data:www-data . .

# Create directories if they don't exist,
# and make sure they have the right permissions
RUN mkdir -p node_modules vendor
RUN chown -R www-data:www-data node_modules vendor

# Copy env file if it does not exist
RUN if ! [ -f .env ]; then \
        cp .env.example .env; \
    fi

# Run setup script
RUN /var/www/salonia.it/scripts/update.sh

# Setup & run entrypoint script
RUN chmod +x docker-entrypoint.sh
ENTRYPOINT ./docker-entrypoint.sh
