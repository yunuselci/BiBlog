# Installation

1) composer install
2) npm install
3) cp .env.example .env
4) Set your database name and APP_URL correctly ex: ```APP_URL=http://localhost:8000```
5) php artisan key:generate
6) php artisan vendor:publish --provider="Ek0519\Quilljs\FieldServiceProvider"
7) php artisan migrate
8) php artisan storage:link
9) php artisan nova:user
