#! /bin/bash
mysql -u root --password=<DB_ROOT_PASSWORD> -e "CREATE DATABASE playgrounds DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;"
mysql -u root --password=<DB_ROOT_PASSWORD> -e "CREATE DATABASE playgrounds_test DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;"
mysql -u root --password=<DB_ROOT_PASSWORD> -e "CREATE USER 'playgrounds'@'%' IDENTIFIED BY '<DB_PASSWORD>';"
mysql -u root --password=<DB_ROOT_PASSWORD> -e "GRANT ALL ON playgrounds.* TO 'playgrounds'@'%';"
mysql -u root --password=<DB_ROOT_PASSWORD> -e "GRANT ALL ON playgrounds_test.* TO 'playgrounds'@'%';"
