#TEST

FROM debian:buster-20210311

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get -y update && apt-get -y install gnupg2 nano wget unzip 

#SERVEUR WEB
RUN apt-get -y install nginx mariadb-server
RUN apt-get -y install php7.3-fpm php7.3-mysql php7.3-cgi php7.3-mbstring php7.3-gd ; \ 
    apt-get -y install php7.3-xsl php7.3-curl php-pear php7.3-intl php7.3-soap ; \ 
    apt-get -y install php7.3-zip php7.3-xml php7.3-xmlrpc

ADD default /etc/nginx/sites-available/

RUN sed -i s/'max_execution_time = 30'/'max_execution_time = 3600'/ /etc/php/7.3/fpm/php.ini
RUN sed -i s/'upload_max_filesize = 2M'/'upload_max_filesize = 1G'/ /etc/php/7.3/fpm/php.ini
RUN sed -i s/'max_allowed_packet\t= 16M'/'max_allowed_packet\t= 1G'/ /etc/mysql/my.cnf 
RUN sed -i s/'post_max_size = 8M'/'post_max_size\t= 1G'/ /etc/php/7.3/fpm/php.ini
RUN sed -i s/'index.nginx-debian.html'/'index.php'/ /etc/nginx/sites-available/default

#FICHIERS CONFIG
ADD infos.php /var/www/html/
#WEBs APPs
RUN cd /var/www/html/ ; \ 
# https://files.phpmyadmin.net/phpMyAdmin/4.8.2/phpMyAdmin-4.8.2-all-languages.zip PMA 510
    wget https://files.phpmyadmin.net/phpMyAdmin/5.1.0/phpMyAdmin-5.1.0-all-languages.zip ; \
    unzip phpMyAdmin*.zip ; rm phpMyAdmin*.zip ; \
    mv phpMyAdmin* phpmyadmin ; chown -R www-data:www-data ./phpmyadmin
# https://forge.sigb.net/attachments/download/2910/pmb7.3.1.zip PMB 7310
RUN cd /var/www/html/ ; \ 
    wget https://forge.sigb.net/attachments/download/2910/pmb7.3.1.zip ; \
    unzip pmb7*.zip ; rm pmb7*.zip
#https://fr.wordpress.org/latest-fr_FR.zip LATEST WORDPRESS
RUN cd /var/www/html/ ; \
    wget https://fr.wordpress.org/latest-fr_FR.zip ; \
    unzip latest*.zip ; rm latest*.zip ; \
    mv wordpress/ wp/

ADD wp-config.php /var/www/html/wp/

RUN chown -R www-data:www-data /var/www/html/
ADD index.html /var/www/html/
#FIN
ADD buServer.sh /usr/local/bin/

EXPOSE 80

VOLUME ["/var/lib/mysql","/etc/pmb"]

CMD ["/usr/local/bin/buServer.sh"]