FROM webup/laravel:9-php8.1.2

ARG user=1000

RUN groupadd docker --gid ${user}
RUN useradd docker --uid ${user} --gid ${user} --create-home

COPY ops/dockerfiles/app/fpm-docker.conf /usr/local/etc/php-fpm.d/docker.conf
COPY ops/dockerfiles/app/php.ini /usr/local/etc/php/

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini;
