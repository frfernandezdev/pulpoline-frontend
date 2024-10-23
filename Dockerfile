FROM php:8.1-apache


RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY ./src /var/www/html/
COPY ./src/.htaccess /var/www/html/.htaccess

RUN chown -R www-data:www-data /var/www/html/

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

EXPOSE 80

CMD ["apache2-foreground"]
