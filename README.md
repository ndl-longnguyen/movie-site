# movie-site

-   Basic CRUD, Pusher RealTime, Upload File, Send Mail with Laravel 7
-   Font-End use Bootstrap 4, jQuery

## Install

-   [Install PHP](https://www.php.net/downloads.php) (PHP >= 7.0.0)
-   [Install Composer](https://getcomposer.org/download/)

## Clone REPO

<pre>$ git clone https://gitlab.com/hikoni/training-longnguyendai.git </pre>

-   Move into project `movie-site`
    <pre>$ cd training-longnguyendai/Practice-project/movie-site </pre>
-   Install `composer` packages
    <pre>$ composer install </pre>
-   Create file .env
    <pre>$ cp .env.example .env </pre>

## Config Pusher

-   [Rigister acount pusher](https://dashboard.pusher.com/)
-   Create your app
-   Set for .env. file
    <pre>PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_APP_CLUSTER=</pre>

## Config .env

-   Database
-   Email

## Requirements

-   Create APP_KEY
    <pre>$ php artisan key:generate </pre>
-   Cache config
    <pre>$ php artisan config:cache </pre>
-   Make database
    <pre>$ php artisan migrate </pre>
-   Create acount Admin (email: admin@gmail.com - password: admin)
    <pre>$ php artisan db:seed --class=AdminSeeder </pre>

## Run project

<pre>$ php artisan serve </pre>
