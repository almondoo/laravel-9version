app:
	docker-compose exec app ash

nginx:
	docker-compose exec nginx bash

mysql:
	docker-compose exec db bash

ps:
	docker-compose ps

up:
	docker-compose up -d

down:
	docker-compose down

build:
	docker-compose build
