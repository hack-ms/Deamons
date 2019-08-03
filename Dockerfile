FROM debian

MAINTAINER David Turati

RUN apt-get update
RUN apt-get install -y php
WORKDIR /var/www/html
