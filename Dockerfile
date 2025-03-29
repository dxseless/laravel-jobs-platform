FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite3 \  # Добавляем sqlite3
    && docker-php-ext-install pdo_sqlite mbstring exif pcntl bcmath gd zip \  # Меняем pdo_mysql на pdo_sqlite
    && a2enmod rewrite

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

RUN composer install --no-interaction --no-scripts
RUN if [ ! -f ".env" ]; then cp .env.example .env; fi
RUN php artisan key:generate
RUN npm install
RUN npm run dev

CMD ["sh", "-c", "php artisan migrate --force && php artisan db:seed --force && php artisan queue:work & apache2-foreground"]