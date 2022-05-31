<div style="display: flex; align-items: center; justify-content: center">
        <img src="database_schema.svg" width="512" alt="Database Schema">
    </a>
</div>



## Class Management System

This Class Management System is built using Vue JS with Vue Router and Bootstrap
as the front-end SPA with Laravel as the backend RESTful API service provider along 
with Laravel Sanctum for authentication.

The Class Management System utilizes the provided database relation schema.


For recreating the setup
* Copy the .env.example as .env and add your necessary database credentials there.
* In order to start the server run `php artisan serve` and go to link provided by the command.
* The database migrations and seeds are already present, to fill the database with test data run `php artisan migrate:refresh --seed`
* For routes use the commands -
  * `php artisan route:clear` for clearing route cache
  * `php artisan optimize` for regenerating and optimizing routes
  * `php artisan route:list` for seeing all the available routes




