# Installation

1) composer install
2) npm install
3) cp .env.example .env
4) php artisan key:generate
5) php artisan vendor:publish --provider="Ek0519\Quilljs\FieldServiceProvider"
6) php artisan migrate
7) php artisan storage:link
8) php artisan nova:user
