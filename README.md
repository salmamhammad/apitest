# ApiTest

## Задача
Реализовать небольшое REST API сервиса коротких ссылок: пользователь присылает длинный URL, получает короткий код, по короткому коду — редирект на оригинальный URL. Также есть метод со статистикой переходов.

## Технические требования
- PHP 8.1.
- Laravel 10.
- SQLite.
- Eloquent.
- Короткий код — 6 символов, alphanumeric, уникальный.

## как поднять проект
```bash
get clone https://github.com/salmamhammad/apitest.git
cd apitest
cp .env.example .env
composer install
php artisan key:generate
```
Database Setup: need to fix DB_DATABASE=F:\apitest\\database\database.sqlite
to the current path of database.sqlite
```bash
php artisan migrate
php artisan serve
```
Server will run at: http://127.0.0.1:8000

## API Endpoints

- POST /api/links
- GET /{code}
- GET /api/links/{code}/stats


## two branchs
- main: laravel + sqlite
- docker_setup : laravel +mysql+ docker
