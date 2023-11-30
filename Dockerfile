FROM php:8.2-apache

RUN apt-get update && apt-get install -y software-properties-common lsb-release apt-transport-https ca-certificates wget
# RUN apt-add-repository ppa:ondrej/php

RUN apt-get clean
RUN apt-get update && apt-get install -y \
zlib1g-dev libicu-dev g++ \
libjpeg62-turbo-dev \
libzip-dev \
libpng-dev \
libwebp-dev \
libfreetype6-dev \
libxml2-dev \
git \
zip \
unzip \
&& docker-php-ext-configure gd --with-webp=/usr/include/webp --with-jpeg=/usr/include --with-freetype=/usr/include/freetype2/ \
&& docker-php-ext-install -j$(nproc) gd \
&& docker-php-ext-install -j$(nproc) zip \
&& docker-php-ext-configure intl && docker-php-ext-install intl mysqli && a2enmod rewrite && service apache2 restart

RUN echo "ServerName localhost" | tee -a /etc/apache2/apache2.conf
  
RUN sed -i "s/Listen 80/Listen 8082/" /etc/apache2/ports.conf

EXPOSE 8082