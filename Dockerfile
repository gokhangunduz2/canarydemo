FROM php:8.2-apache

WORKDIR /var/www/html

COPY papp/ .

ENV APP_VERSION=blue

EXPOSE 80
