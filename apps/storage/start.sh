echo "start profiling"
TPS=$(date +%s)
echo "${TPS}"

php artisan key:generate

touch /var/www/kitchen/storage/logs/laravel.log


php artisan queue:work  --queue=default,storage  --tries=3 &
php artisan migrate --force

echo "Is running"
php-fpm
