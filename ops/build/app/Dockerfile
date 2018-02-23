FROM webup/laravel-php-7.0:v0.9

ARG user=1500

RUN groupadd docker --gid ${user}
RUN useradd docker --uid ${user} --gid ${user} --create-home

# override php.ini
COPY ops/build/app/php.ini /usr/local/etc/php/

# Add sources
ADD . /srv/http
RUN chown -R docker:docker .

# Setup
USER ${user}
RUN composer install
