FROM node:5.8.0

ARG user=1000

WORKDIR /srv/http

RUN groupadd docker --gid ${user}
RUN useradd docker --uid ${user} --gid ${user} --create-home
