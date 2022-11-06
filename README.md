# Bulletin System
>Bulletin System

### :hammer_and_wrench: OS Installation
1. Install the latest ubuntu 20.04 LTS to an SD card using raspberry pi imager and connect the SD card to the raspberry pi
    <div>
      <img src='https://user-images.githubusercontent.com/77730490/195964670-a37b4e39-271e-4608-b31d-fdfc40e02273.png'/>
    </div>
2. Boot the system and update using the code below.
```
sudo apt update && sudo apt upgrade
```
3. Install mysql server using the command below
```
sudo apt install mariadb-server
```
4. After installing the mariadb server. Execute the command below to setup the database.
```
sudo mysql_secure_installation
```
5. After setting up password just select no 'n' in everything in the setup.
6. To access Mariadb, execute the command below.
```
sudo mysql -u root -p
```
8. Install the MYSql connector to PHP using the command below.
```
sudo apt install php-mysql
```
9. Installing apache,php, msql https://randomnerdtutorials.com/raspberry-pi-apache-mysql-php-lamp-server/
10. Modify nginx setting https://pimylifeup.com/raspberry-pi-nginx/


### :hammer_and_wrench: Mariabd commands
- Creating new database.
```
CREATE DATABASE <DATABASE NAME>
```
- Creating new user
```
CREATE USER '<USERNAME>'@'localhost' identified by '<PASSWORD>';
```
- Giving acces to a user
```
GRANT ALL PRIVILEGES ON <DATABASE NAME>.* TO '<USERNAME>'@'localhost';
```
### :hammer_and_wrench: Database setup
Database Name: bulletinDb,
User: admin,
Pass: admin
### :hammer_and_wrench: Web Application setup
php file are on /var/www/html


Other Commands
```
SHOW DATABASES; --show all the database

SELECT User FROM mysql.user; -- show all the user in the database.
```


### Other note
### Changing acces to www/html folder
```
pi@raspberrypi:~ $ ls -lh /var/www/
pi@raspberrypi:~ $ sudo chown -R pi:www-data /var/www/html/
pi@raspberrypi:~ $ sudo chmod -R 770 /var/www/html/
pi@raspberrypi:~ $ ls -lh /var/www/
```

### Modifying nginx default settings - https://pimylifeup.com/raspberry-pi-nginx/
```
sudo nano /etc/nginx/sites-enabled/default
```

Authentication token: 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


### PHP My admin
> LINK: http://localhost/phpmyadmin/
```
Username : admin 
Password : admin
```

```
CREATE TABLE `KIOSKDB`.`tblcontent` ( 
  `cid` INT NOT NULL AUTO_INCREMENT , 
  `filetype` VARCHAR(10) NOT NULL , 
  `filelocation` VARCHAR(250) NOT NULL , 
  `filename` VARCHAR(50) NOT NULL , 
  `textheader` VARCHAR(50) NOT NULL , 
  `textcontent` VARCHAR(50) NOT NULL , 
  `bc` VARCHAR(50) NOT NULL , 
  `textcolor` VARCHAR(50) NOT NULL , 
  PRIMARY KEY (`cid`)
) 
ENGINE = InnoDB;
```






