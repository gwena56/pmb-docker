#!/bin/bash

function initialiser_db {
	service mysql stop
	mysql_install_db
	service mysql start
	echo 
"	 CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin'; \
	 GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' WITH GRANT OPTION; \ 
" | mysql -uroot

}

function initialiser1 {
	mkdir /etc/pmb
	touch /etc/pmb/db_param.inc.php
	chown www-data:www-data /etc/pmb/db_param.inc.php
	ln -s /etc/pmb/db_param.inc.php /var/www/html/pmb/includes/db_param.inc.php
}

function initialiser2 {
    touch /etc/pmb/opac_db_param.inc.php
    chown www-data:www-data /etc/pmb/opac_db_param.inc.php
    ln -s /etc/pmb/opac_db_param.inc.php /var/www/html/pmb/opac_css/includes/opac_db_param.inc.php
}

echo 'boot ...'
ls /var/www/html/pmb/includes/db_param.inc.php || initialiser1
ls /var/www/html/pmb/includes/opac_db_param.inc.php || initialiser2

service mysql start
echo "** CREATE USER ADMIN **"
echo '' | mysql -uadmin -padmin || initialiser_db
sleep 2
echo 'CREATE DATABASE wpbiblio CHARACTER SET utf8 COLLATE utf8_general_ci;' | mysql -uadmin -padmin
sleep 1
echo 'CREATE DATABASE bibli;' | mysql -uadmin -padmin
sleep 1
echo "CREATE USER 'bibli'@'localhost' IDENTIFIED WITH mysql_native_password BY 'bibli';" | mysql -uadmin -padmin
sleep 1
echo "GRANT ALL PRIVILEGE ON bibli.* TO 'bibli'@'localhost' WITH GRANT OPTION;" | mysql -uadmin -padmin
sleep 1
service php7.3-fpm start
nginx -g 'daemon off;'