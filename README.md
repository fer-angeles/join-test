<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## PHP Version

Once the PHP is installed we open a system terminal to confirm the PHP version that we have installed. The application can only be executed with php >= 8.0
```
php -v 
```

## Composer

When we have the correct PHP version in our environment we will proceed to install the [**composer**](https://getcomposer.org/download/) library to install the necessary Laravel’s dependencies.
- [Install **composer** on Windows](https://getcomposer.org/doc/00-intro.md#installation-windows).
- [Install **composer** on Mac](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos).
- [Install **composer** on Linux](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos).

## Creating Path and Cloning the repository

We open a system’s terminal and we go to the path where we want to clone our repository. **Example**:
```
cd Documents 
```
Once in our file, we clone the repository in our environment in the following way:

```
origin	https://github.com/fer-angeles/join-test.git new_floder
```

Once the repository is finished to clone, we go inside the file which was created when cloning the repository.

```
cd new_folder
```
Inside the file we install all the necessary library so the framework works in the correct way with the following command
```
composer install
```
Once the library is finished to install, a file called vendor will be created. In it we can use the library that includes the framework called artisan, with the following command we can visualize the list of commands that were created and that Laravel includes
```
php artisan list
```
Once the library is finished to install, run command for the install the Database Aplication
```
php artisan migrate
```
