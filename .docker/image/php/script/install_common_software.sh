#!/bin/sh

apt-get update -yqq
apt-get install -yqq \
    ssh \
    curl \
    git \
    htop \
    iputils-ping \
    procps \
    sudo \
    unzip \
    vim \
    mariadb-client \
    libpng-dev \
    libzip-dev \
    zip \
    #certbot \


#cleanup
apt-get autoremove -yqq && apt-get clean -yqq;

#install composer
curl https://getcomposer.org/installer > /tmp/composer-setup.php \
  && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \
  && rm /tmp/composer-setup.php \
  && chmod +x /usr/local/bin/composer


