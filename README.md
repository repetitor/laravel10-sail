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

http://localhost:90/laravel-websockets

http://localhost:90/event

local-pusher

1 php artisan websockets:serve

2? npm run dev

https://www.honeybadger.io/blog/a-guide-to-using-websockets-in-laravel/
