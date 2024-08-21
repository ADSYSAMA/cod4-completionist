# ./docker/php/Dockerfile
FROM php:8.3-fpm

RUN apt-get update && \
apt-get install -y libzip-dev unzip zip libaio1 wget zlib1g-dev lsof fontconfig libxrender1 xfonts-75dpi xfonts-base libjpeg62-turbo libxext6 libicu-dev git gcc make libssh2-1-dev libssh2-1 libjpeg-dev libpng-dev cron libfreetype6-dev

RUN docker-php-ext-configure intl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install intl gd
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash
RUN apt install symfony-cli

# Create user and set permissions
RUN useradd -ms /bin/bash symfony && \
    echo 'alias sf="php bin/console"' >> /home/symfony/.bashrc

WORKDIR /srv

RUN PATH=$PATH:/srv/vendor/bin:bin
