FROM php:8.1.8-fpm

# Base config
# Do not change this part, prefer update the "Project config" part below

WORKDIR /srv/http

## App
RUN apt-get update && apt-get install -y \
    build-essential \
    locales \
    git \
    unzip \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    imagemagick \
    libmagickwand-dev \
    curl \
    libcurl4 \
    libcurl4-gnutls-dev \
    gettext

RUN pecl install imagick-3.7.0
RUN pecl install redis
RUN docker-php-ext-enable redis

RUN docker-php-ext-install -j$(nproc) pdo pdo_mysql curl iconv gettext zip opcache \
    && docker-php-ext-enable imagick

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php --version=2.3.10 --filename=composer --install-dir=/usr/local/bin \
    && php -r "unlink('composer-setup.php');"

## Cronr
RUN curl -L https://github.com/agence-webup/cronr/releases/download/v1/cronr_1_build1_linux > /usr/local/bin/cronr && chmod +x /usr/local/bin/cronr

## Timezone
RUN echo 'Europe/Paris' > /etc/timezone && dpkg-reconfigure -f noninteractive tzdata

## Locales
RUN sed -i '/^# fr_FR.UTF-8 /c fr_FR.UTF-8 UTF-8' /etc/locale.gen
RUN locale-gen


# Project config

ARG user=1500

RUN groupadd docker --gid ${user}
RUN useradd docker --uid ${user} --gid ${user} --create-home

COPY ops/build/app/fpm-docker.conf /usr/local/etc/php-fpm.d/docker.conf
COPY ops/build/app/php.ini /usr/local/etc/php/

## Add sources
COPY --chown=docker:docker . /srv/http
RUN chown docker:docker .

## Setup
USER ${user}
RUN composer install
