FROM php:8.2-apache

RUN apt-get update && apt-get install -y libicu-dev libsqlite3-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo_sqlite

RUN a2enmod rewrite

COPY . /var/www/html/

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

RUN chown -R www-data:www-data /var/www/html/writable \
    && chmod -R 775 /var/www/html/writable \
    && chown -R www-data:www-data /var/www/html/database.db 2>/dev/null || true

EXPOSE 80