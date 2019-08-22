FROM wordpress:latest
LABEL maintainer="steliosioannides@hotmail.com"
ENV APACHE_RUN_USER='www-data'
ENV APACHE_RUN_GROUP='www-data'

#update & upgrade server
RUN apt-get update && apt-get upgrade -y

#install mhsendmail
RUN curl --location --output /usr/local/bin/mhsendmail https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64 && \
    chmod +x /usr/local/bin/mhsendmail

RUN echo 'sendmail_path="/usr/local/bin/mhsendmail --smtp-addr=mailhog:1025 --from=no-reply@docker.dev"' > /usr/local/etc/php/conf.d/mailhog.ini

RUN usermod -u 1000 ${APACHE_RUN_USER}

USER ${APACHE_RUN_USER}

WORKDIR /var/www/html

COPY --chown=www-data:www-data /webroot/wp-config.php /var/www/html/wp-config.php
