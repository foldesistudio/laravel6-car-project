
<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>  
  
This app made in with the following versions:  
  
- Laravel 6.18.0
- PHP 7.4.2
- MariaDB 10.4.11
  
## Quick start guide  
  
Clone this repository  
  
 
``` 
$ https://github.com/foldesistudio/laravel6-car-project.git
```  
  
Install dependencies  
```  
$ composer install
```  
  
Rename '.env.example' file to '.env' at the project root folder.  
  
Generate Application Key  
```  
$ php artisan key:generate  
```  
  
Change your database credentials  
  
Create a database and name it to: "laravel_car" ; Collation: utf8mb4_unicode_ci  
  
Set up database tables and seed default records  
```  
$ php artisan migrate:fresh --seed  
```  

This project came with predefined admin
```  
email: admin@admin.com
password: admin  
```
