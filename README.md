# deploy
```shell

git clone ...

# https://laravel.com/docs/10.x/sail#executing-composer-commands
docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php82-composer:latest \
composer install --ignore-platform-reqs

./vendor/bin/sail up

# sail
# https://laravel.com/docs/10.x/sail
```
