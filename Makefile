setup:
	docker compose build
	@make up

app:
	docker compose exec app ash

nginx:
	docker compose exec nginx bash

mysql:
	docker compose exec db bash

ps:
	docker compose ps

up:
	docker compose up -d

down:
	docker compose down

build:
	docker compose build

composer-install:
	@make composer-install-for-container
	@make composer-install-for-host

composer-install-for-container:
	docker compose exec app composer install

	# Makefileでは変数展開は実行前に行われてしまうので $$(pwd) のように $$ 2個付ける
	# :/code -w /code このcodeの部分dockerのマウントさせるディクレトリを指定している
composer-install-for-host:
	docker compose run --rm -v $$(pwd)/laravel:/code -w /code app composer install