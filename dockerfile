FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpq-dev \
    curl \
    nodejs \
    npm

RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql \
    zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install
RUN npm run build

RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

RUN a2enmod rewrite

COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]