FROM node:6.9.4

ARG user=1000

WORKDIR /srv/http

RUN groupadd docker --gid ${user}
RUN useradd docker --uid ${user} --gid ${user} --create-home

RUN npm install -g yarn
