FROM wordpress:latest
LABEL maintainer="steliosioannides@hotmail.com"
ENV APACHE_RUN_USER='www-data'
ENV APACHE_RUN_GROUP='www-data'

#update & upgrade server
RUN apt-get update && apt-get upgrade -y

RUN usermod -u 1000 ${APACHE_RUN_USER}

USER ${APACHE_RUN_USER}

WORKDIR /var/www/html

COPY --chown=www-data:www-data /webroot/wp-config.php /var/www/html/wp-config.php
