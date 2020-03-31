FROM webup/laravel:7

ARG user=1000

RUN groupadd docker --gid ${user}
RUN useradd docker --uid ${user} --gid ${user} --create-home

COPY ops/dockerfiles/app/fpm-docker.conf /usr/local/etc/php-fpm.d/docker.conf
COPY ops/dockerfiles/app/php.ini /usr/local/etc/php/
