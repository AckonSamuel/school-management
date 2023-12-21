web: vendor/bin/heroku-php-apache2 public/
release: php artisan migrate --force
release: php artisan db:seed --force
release: npm install
release: npm run dev