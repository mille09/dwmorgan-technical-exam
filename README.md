# dwmorgan-technical-exam
technical exam solution

## Dependencies
Make sure that you have the following installed
* [php](https://www.php.net/downloads.php)
* [node.js](https://nodejs.org/en/download/)
* [composer](https://getcomposer.org/download/)
* [postgreSQL](https://www.postgresql.org/download/)

## Installations
Run composer install in project directory to install necessary laravel dependencies
```
composer install
```
Run npm install in project directory to install local dependencies
```
npm install
```

## Web application
Create database needed
```
psql -U <username>
<enter password>
CREATE DATABASE covid;
```
Run migration in project directory to create the table
```
php artisan migrate
```
Copy .env.example file to create .env file. Update DB_USERNAME and DB_PASSWORD based on the username and password of your database.
```
copy .env.example .env
```
Run php artisan serve to deploy project in localhost
```
php artisan serve
```
You can now access the web app in localhost.

