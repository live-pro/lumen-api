
### Installation

Simple API using lumen 5.7.* . 
Install the dependencies, database setup and ready the project.

```sh
$ git clone https://github.com/live-pro/lumen-api.git
$ composer install
# copy .env.example to .env then change Database connection
$ cp .env.example .env  
$ php artisan migrate
$ php artisan db:seed
$ php -S localhost:8000 -t public
```
