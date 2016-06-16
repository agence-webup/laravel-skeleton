FROM node:5.8.0

WORKDIR /srv/http

RUN groupadd docker --gid 1000
RUN useradd docker --uid 1000 --gid 1000 --create-home

RUN npm install -g bower
