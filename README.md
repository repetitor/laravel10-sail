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

# postman-collection

https://api.postman.com/collections/15807573-19523e0f-1d08-45b9-89bb-a9eb03ba346e?access_key=PMAT-01H1P97N3VDP33JG2K4FP2HDXN

# postman-workspace

https://www.postman.com/galactic-star-406581/workspace/telegrambot

# postman-workspace r202

https://www.postman.com/repetitor202/workspace/bot-telegram

# dockerhub

docker pull repetitor202/bot-telegram:sail-8.2

