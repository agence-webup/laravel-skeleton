FROM webup/laravel:6-php8.0

COPY ops/build/app/fpm-docker.conf /usr/local/etc/php-fpm.d/docker.conf
COPY ops/build/app/php.ini /usr/local/etc/php/

# Cronr
RUN curl -L https://github.com/agence-webup/cronr/releases/download/v1/cronr_1_build1_linux > /usr/local/bin/cronr && chmod +x /usr/local/bin/cronr

ARG user=1500

RUN groupadd docker --gid ${user}
RUN useradd docker --uid ${user} --gid ${user} --create-home

# Add sources
COPY --chown=docker:docker . /srv/http
RUN chown docker:docker .

# Setup
USER ${user}
RUN composer install
