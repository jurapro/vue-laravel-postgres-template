FROM php:8.1.8-fpm
ARG USER=www-data

# Create a non-root user
RUN useradd -m -s /bin/bash -p $(openssl passwd -1 $USER) $USER
RUN usermod -g $USER $USER
RUN usermod -aG sudo $USER

WORKDIR /app

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libpq-dev \
    libzip-dev && \
    apt-get install -y \
    git \
    unzip \
    zip \
    sqlite3 \
    openssh-client \
    default-mysql-client && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN chown -R $USER:$USER .

RUN docker-php-ext-install pdo pdo_pgsql sockets bcmath zip pcntl posix
COPY --chown=$USER:$USER . .
#RUN chmod +x ./wait-for-it.sh
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
COPY ./.deploy/production/dev.ini /usr/local/etc/php/conf.d/dev.ini
RUN composer install
RUN chown -R $USER:$USER .
USER $USER
