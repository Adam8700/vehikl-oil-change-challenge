# Vehikl Oil Change Challenge

A small Laravel 12 application that determines whether a vehicle is due for an oil change based on:

- Kilometres driven since the previous oil change
- Time since the previous oil change

An oil change is considered due if either:

- More than 5,000 km have been driven since the previous oil change
- More than 6 months have passed since the previous oil change

## Built With

- Laravel 12
- PHP
- SQLite
- Blade

## Setup

Clone the repository:

```bash
git clone https://github.com/Adam8700/vehikl-oil-change-challenge.git
cd vehikl-oil-change-challenge
```


Install dependencies:
```bash
composer install
```


Create the environment file:
```bash
copy .env.example .env
```


Generate the application key:
```bash
php artisan key:generate
```
Create the SQLite database file:

```bash
php -r "touch('database/database.sqlite');"
```

Run the database migrations:
```bash
php artisan migrate
```


Start the application:
```bash
php artisan serve
```


Then open:

http://127.0.0.1:8000
