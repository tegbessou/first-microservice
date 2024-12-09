cp /home/site/wwwroot/azure/nginx/default /etc/nginx/sites-available/default

pkill -o -USR2 php-fpm

service nginx reload

cd /home/site/wwwroot

php bin/console cache:clear
#php bin/console doctrine:database:create --if-not-exists
#php bin/console doctrine:migrations:migrate --no-interaction