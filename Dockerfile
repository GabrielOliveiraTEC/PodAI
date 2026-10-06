FROM php:8.2-apache

# Instala a extensão do MySQL para o PHP (PDO e mysqli)
RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY . /var/www/html/

# Redireciona para a página de login
RUN echo "<?php header('Location: /login/'); exit(); ?>" > /var/www/html/index.php

EXPOSE 80
