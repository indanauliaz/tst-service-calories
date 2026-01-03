# Pake PHP versi 8.1 dengan Apache
FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libsqlite3-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo_sqlite zip

RUN a2enmod rewrite

COPY . /var/www/html/

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer update --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html/writable \
    && chmod -R 775 /var/www/html/writable \
    && chown -R www-data:www-data /var/www/html/database.db 2>/dev/null || true

EXPOSE 80