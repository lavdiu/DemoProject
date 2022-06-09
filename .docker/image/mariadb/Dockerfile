FROM mariadb:latest AS app_mariadb

COPY ./config/dev/mariadb.cnf /etc/mysql/conf.d/mariadb.cnf

RUN ln -snf /usr/share/zoneinfo/Europe/Tirane /etc/localtime && echo "Europe/Tirane" > /etc/timezone


