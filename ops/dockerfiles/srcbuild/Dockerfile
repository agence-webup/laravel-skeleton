FROM alpine:3.3

RUN apk add --update \
    php-json \
    php-openssl \
    php-phar \
    php-dom \
    php-pdo \
    php-pdo_mysql \
    php-xml \
    php-mcrypt \
    curl \
    g++ \
    make \
    python \
    py-pip \
    libpng-dev \
    bash \
    nasm \
    autoconf \
    automake \
    m4 \
    nodejs \
    git \
    && rm -rf /var/cache/apk/*

RUN npm update -g npm@3.3.5

RUN npm install -g bower

WORKDIR /srv/http
