FROM php:7.0-fpm

ARG user=1000

WORKDIR /srv/http

RUN groupadd docker --gid ${user}
RUN useradd docker --uid ${user} --gid ${user} --create-home

# App

RUN apt-get update && apt-get install -y \
        build-essential \
        locales \
	git \
	unzip \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        curl \
        libcurl3 \
        libcurl4-gnutls-dev \
        gettext

RUN docker-php-ext-install -j$(nproc) pdo pdo_mysql curl mcrypt iconv gettext mbstring zip \
     && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
     && docker-php-ext-install -j$(nproc) gd

RUN php -r "readfile('https://getcomposer.org/installer');" > composer-setup.php \
    && php composer-setup.php --version=1.0.0 --filename=composer --install-dir=/usr/local/bin \
    && php -r "unlink('composer-setup.php');"

COPY ops/dockerfiles/app/fpm-docker.conf /usr/local/etc/php-fpm.d/docker.conf
COPY ops/dockerfiles/app/php.ini /usr/local/etc/php/

# Timezone

RUN echo 'Europe/Paris' > /etc/timezone

# Locales

RUN sed -i '/^# fr_FR.UTF-8 /c fr_FR.UTF-8 UTF-8' /etc/locale.gen
RUN locale-gen
