git pull origin master

composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

php artisan migrate --force

npm install
npm run prod


chown -R www-data.www-data /var/www/blog
