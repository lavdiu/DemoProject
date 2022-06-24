FROM mariadb:latest AS app_mariadb

COPY ./config/dev/mariadb.cnf /etc/mysql/conf.d/mariadb.cnf

RUN ln -snf /usr/share/zoneinfo/Europe/Tirane /etc/localtime && echo "Europe/Tirane" > /etc/timezone
RUN mkdir -p /var/lib/mysql && chown -R mysql:mysql /var/lib/mysql
RUN mkdir -p /var/lib/mysql_backup
RUN chown -R www-data:www-data /var/lib/mysql_backup
RUN chmod -R 777 /var/lib/mysql_backup


