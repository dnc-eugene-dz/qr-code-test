build:
	docker-compose up --build -d
	docker-compose exec phpfpm composer install
	docker-compose exec phpfpm cp .env.example .env
	docker-compose exec phpfpm php artisan key:generate
	docker-compose exec phpfpm php artisan storage:link
	docker-compose exec phpfpm php artisan migrate:fresh
	npm install
	npm run dev
