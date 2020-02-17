FROM php:7-fpm
RUN apt-get update -y && apt-get install -y openssl zip unzip git zlib1g-dev libpng-dev libzip-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql gd zip
WORKDIR /app
COPY . /app