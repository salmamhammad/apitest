# ApiTest with docker setup

## Задача
Реализовать небольшое REST API сервиса коротких ссылок: пользователь присылает длинный URL, получает короткий код, по короткому коду — редирект на оригинальный URL. Также есть метод со статистикой переходов.

## Технические требования
- PHP 8.1.
- Laravel 10.
- mysql.
- docker
- containers: laravel_app, laravel_nginx, laravel_mysql
- Eloquent.
- Короткий код — 6 символов, alphanumeric, уникальный.

## как поднять проект
```bash
get clone https://github.com/salmamhammad/apitest.git
cd apitest
cp .env.example .env
composer install
php artisan key:generate
docker compose up -d --build
docker exec -it laravel_app bash
php artisan migrate
exit
```

Server will run at: http://localhost:8000

## API Endpoints

- POST /api/links
- GET /{code}
- GET /api/links/{code}/stats

## testing API

postman collection
apitest.postman_collection.json
