# Supdate JAVA Server V1.0

## Introduction

> The goal of the project is to make a simple way for updating your java app :) just few lines to gain a big time :) 
This project is linked to my lib Supdate JAVA. The project allow you to create multiple project and upload files into. Easy to manage, easy life !

## Features
* Create multiple project folders
* Server status with maintenance system
* Easy manage your files (Create project / delete / view --- Upload files / Delete / add to download list !)

## Installation

> <p>1 - You need to configure your web server with the Laravel System requirement : https://laravel.com/docs/5.7/installation</p>
> <p>2 - Download the project and install it as a laravel framework</p>
> <p>3 - Go in the public folder of the app and set the 777 permissions on the folder "JAVA_UPDATER" :)</p>
> <p>4 - Configure the .env file</p>
```php
DB_CONNECTION=mysql
DB_HOST={YOUR_DATABASE_HOST}
DB_PORT={YOUR_DATABASE_PORT --default : 3306}
DB_DATABASE={YOUR_DATABASE_NAME}
DB_USERNAME={YOUR_USER}
DB_PASSWORD={YOUR_PASSWORD}
```
> <p>5 - Configure your php.ini with the following config :)</p>
```php
file_uploads = On
upload_max_filesize = 20G
max_file_uploads = 100
post_max_size = 20G
```
> <p>6 - After it go to : {YOUR_SERVER_ADDRESS}/public/install</p>
> <p>7 - the server will ask you to create a account after it, you have finish the configuration ! enjoy !</p>

## How to use

> <p>1 - Create a project on your dashboard</p>
> <p>2 - Click on the new project in the project list </p>
> <p>3 - Upload files </p>
> <p>4 - Select files to include in the XML file </p>
> <p>5 - Generate the xml file </p>
> <p>6 - Finish :) you have configured the Server side, now let's go configure the client side ! </p>
