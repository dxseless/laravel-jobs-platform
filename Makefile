setup:
	composer install
	cp .env.example .env
	php artisan key:generate
	php artisan migrate
	php artisan db:seed
    php artisan queue:work
    php artisan serve
    npm install
    npm run dev
    
