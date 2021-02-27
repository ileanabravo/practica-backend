# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone git@github.com: https://github.com/ileanabravo/practica-backend.git

Switch to the repo folder

    cd practica-backend

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:https://github.com/ileanabravo/practica-backend.git
    cd laravel-realworld-example-app
    composer install
    cp .env.example .env
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve


----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/practica-backend


