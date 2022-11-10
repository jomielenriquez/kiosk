# Bulletin System
>Bulletin System

### :hammer_and_wrench: OS Installation
1. Install the latest ubuntu 20.04 LTS to a SD card using raspberry pi imager and connect the SD card to the raspberry pi
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

Authentication Token
```
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
```


###  Table 
:construction: TBLCONTENT
>TBLCONTENT will be the table where the announcements will be stored


||Table Name|Type|Comment|
|:--:|:--:|:--:|:--:|
|:key:|CID|INT(11)||
||FILETYPE|VARCHAR(10)|IMG - image, VID - video, TXT - text|
||FILELOCATION|VARCHAR(250)|location of the file|
||TEXTHEADER|VARCHAR(50)|Announcement header if text|
||TEXTCONTENT|VARCHAR(50)|Announcement content if text|
||BC|VARCHAR(50)|Background color of text|
||ORDER|INT(11)|Ordering of the announcements|

:construction: TBLSYSTEMPARAMETER
>TBLSYSTEMPARAMETER is the table where the system configurations will be stored i.e. header name


||Table Name|Type|Comment|
|:--:|:--:|:--:|:--:|
|:key:|PARAID|INT(11)||
||PARAMETER|VARCHAR(50)||
||PARAVALUE|VARCHAR(200)||


### Inserting to tblcontent 
```
INSERT INTO `tblcontent`(`filetype`, `filelocation`, `filename`, `textheader`, `textcontent`, `bc`, `textcolor`, `order`) 
VALUES (
    'IMG',
    ' ',
    'https://images.examples.com/wp-content/uploads/2018/10/Vintage-Concert-Poster-Template.jpg',
    ' ',
    ' ',
    ' ',
    ' ',
    2
	),(
    'IMG',
    ' ',
    'https://images.examples.com/wp-content/uploads/2018/10/Vintage-Concert-Poster-Template.jpg',
    ' ',
    ' ',
    ' ',
    ' ',
    3
	)
```
## Updating ng Client Max body size
> Initially, raspi is configured to accept smaller size of body. This will affect the uploading of data. Meaning the client will not be able to upload large files like video and images. See the following command below to modify the body size to enable large file uploads.


Open your raspberry pi terminal and execute the command below.
```
sudo nano /etc/nginx/nginx.conf
```


Add the following line to http or server or location context to increase the size limit in nginx.conf,
```
client_max_body_size 200M;
```

Execute the command below to reload nginx and the changes will be applied
```
sudo systemctl reload nginx.service
```

The client_max_body_size directive assigns the maximum accepted body size of client request, indicated by the line Content-Length in the header of request. If size is greater the given one, then the client gets the error “Request Entity Too Large” (413).


>SOURCE: [https://www.cyberciti.biz/faq/linux-unix-bsd-nginx-413-request-entity-too-large/](https://www.cyberciti.biz/faq/linux-unix-bsd-nginx-413-request-entity-too-large/)





