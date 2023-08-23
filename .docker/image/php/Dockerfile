FROM php:apache AS app_php

ADD ./script/ /var/www/app_setup/script/
#ADD ./config/ /var/www/app_setup/config/
RUN chmod 755 /var/www/app_setup/script/*

RUN /var/www/app_setup/script/set_timezone.sh
RUN /var/www/app_setup/script/install_common_software.sh
RUN /var/www/app_setup/script/php_config.sh
RUN /var/www/app_setup/script/apache_config.sh
#RUN /var/www/app_setup/script/install_app.sh


RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
