FROM markoshust/magento-php:8.2-fpm-0

USER root

RUN docker-php-ext-install calendar

RUN apt-get update

RUN apt-get install nano

USER app

