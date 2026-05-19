FROM node:22-bookworm AS assets

WORKDIR /app

COPY package*.json ./
RUN if [ -f package-lock.json ]; then npm ci; else npm install; fi

COPY vite.config.js ./
COPY resources ./resources
RUN npm run build


FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --no-scripts --optimize-autoloader

COPY . .
RUN composer dump-autoload --no-dev --optimize


FROM php:8.3-apache

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libpq-dev \
        libzip-dev \
        unzip \
    && docker-php-ext-install pdo_mysql pdo_pgsql zip \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

COPY --from=vendor /app ./
COPY --from=assets /app/public/build ./public/build
COPY docker/apache-vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/start-render.sh /usr/local/bin/start-render

RUN chmod +x /usr/local/bin/start-render \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R ug+rw storage bootstrap/cache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
ENV PORT=10000

EXPOSE 10000

CMD ["start-render"]

