#docker run -p 80:80 --name server -v /Users/jose/vsc/estudio/:/var/www/html/ --link basedatos -d php:apache

FROM php:apache
RUN apt-get update
RUN apt-get install -y iputils-ping
RUN apt-get install -y inetutils-traceroute
RUN apt-get install -y iproute2
RUN apt-get install -y curl telnet dnsutils vim
#RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite
RUN rc_service apache2 reload
# RUN docker-php-ext-enable pdo pdo_mysql
#docker-php-ext-install ? ? ? crea los archivos mysqli.so pdo.so pdo_mysql.so en el directorio /usr/local/lib/php/extensions/no-debug-non-zts-20220829/
#Este archivo se debe copiar en /usr/local/etc/php/php.ini-development y php.ini-production agregando la siguiente línea
#/usr/local/lib/php/extensions/no-debug-non-zts-20220829/mysqli.so en la sección Dynamic Extensions


#docker run -p 3306:3306 --name basedatos -v /Users/jose/vsc/estudio/data/:/var/lib/msyql -e MYSQL_ROOT_PASSWORD=Succ355 -d mysql:latest

