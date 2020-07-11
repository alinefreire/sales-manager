FROM php:7.4-fpm

RUN mkdir /app

# Application directory
WORKDIR /app


COPY ./src/ /app/

#####
# PHP
#####
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.4-mysql php-redis php-xdebug php7.4-bcmath php-mongodb \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*


RUN apt-get update \
    && apt-get -y install cron \
    supervisor \
    openssh-client \
    zip \
    unzip \
    wget \
    vim

########
## MONGODB
# https://docs.mongodb.com/php-library/current
# https://github.com/mongodb/mongo-php-library && composer require mongodb/mongodb
########
ARG INSTALL_PHP_MONGO=true
ENV PHP_MONGO_VERSION 1.7.5
RUN if [ ${INSTALL_PHP_MONGO} = true ]; then \
    pecl install mongodb-${PHP_MONGO_VERSION} && \
    docker-php-ext-enable mongodb \
;fi

#####
# GIT
#####
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

#####
# COMPOSER
#####
RUN set -x && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer clear-cache

# Display versions installed
RUN php -v
RUN composer --version