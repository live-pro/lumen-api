
### Installation

Simple API using lumen 5.7.* . 
Install the dependencies, database setup and ready the project.

```sh
$ git clone https://github.com/live-pro/lumen-api.git
$ composer install
# copy .env.example to .env then change Database connection
$ cp .env.example .env
```
Database table creation & dummy data seed
```sh
$ php artisan migrate
$ php artisan db:seed
```
Serve the API
```sh
$ php -S localhost:8000 -t public
```

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/041d9cc81daa3acc4b27)
