.PONY: start-local

start-local:
	php -S localhost:8090 apps/mooc/backend/public/index.php

test:
	./vendor/bin/phpunit