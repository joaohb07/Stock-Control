FROM php:7.2.6-apache 
WORKDIR /var/www/html
RUN docker-php-ext-install mysqli