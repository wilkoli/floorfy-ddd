FROM php:7.3-apache-stretch

ARG COMPOSER_VERSION=1.8.6

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer --version=${COMPOSER_VERSION};

RUN a2enmod rewrite && apt-get update
RUN apt-get install -y git zip unzip libpng-dev

# Only for test purposes you should add: RUN apt-get install -y tree nano beanstalk

RUN docker-php-ext-install pdo pdo_mysql opcache gd

RUN rm -r /var/lib/apt/lists/*
RUN mkdir -p /app && mkdir -p /app/var && mkdir -p /app/var/log/php-cli

RUN echo '' >> /app/.env

