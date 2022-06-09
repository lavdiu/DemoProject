#!/bin/sh

docker-php-ext-install pdo pdo_mysql mysqli gd zip
#pecl install xdebug
#docker-php-ext-enable xdebug
