FROM php:7.2-apache

RUN docker-php-ext-install \
    pdo_mysql \
    && a2enmod \
    rewrite

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

EXPOSE 80
