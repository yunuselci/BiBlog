# Installation

- Clone the project to local repository.

- Copy `.env.example` file as `.env` file and fill your parameters

- Set database configuration on `.env`

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=username
DB_PASSWORD=password
```

- Set APP_URL configuration on `.env`
```php
APP_URL=your_domain
```
For ex:
```php
APP_URL=http://yunuselci.com
APP_URL=http://localhost:8000
```

- Run `composer install`
- Run `npm install`
- Run `npm run dev`
- Run `php artisan key:generate`
- Run `php artisan vendor:publish --provider="Ek0519\Quilljs\FieldServiceProvider"`
- Run `php artisan migrate`
- Run `php artisan storage:link`
- Run `php artisan nova:user`

## Dev.to Api Configuration

- After loading the project and running it successfully, go to the /nova/resources/users path.
- In this path you need to install your dev.to secret key by editing current user.

