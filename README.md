
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
  
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
