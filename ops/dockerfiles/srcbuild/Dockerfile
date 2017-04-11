FROM node:7.8.0

# Neutralize the default user created by the base image
RUN groupmod -g 999 node && usermod -u 999 -g 999 node

ARG user=1000

WORKDIR /srv/http

RUN groupadd docker --gid ${user}
RUN useradd docker --uid ${user} --gid ${user} --create-home
