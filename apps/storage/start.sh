echo "start profiling"
TPS=$(date +%s)
echo "${TPS}"

composer install --no-autoloader --no-scripts --no-dev

composer dump-autoload --optimize

cp .env.example .env
php artisan key:generate

touch /var/www/kitchen/storage/logs/laravel.log

echo "Waiting for db"
sleep 55

php artisan migrate --force
php artisan queue:work  --queue=default,storage  --tries=3 &

echo "Is running"
php-fpm
