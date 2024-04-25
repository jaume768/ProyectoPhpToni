
FROM php:8.3-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN a2enmod rewrite

RUN { \
        echo 'upload_max_filesize=50M'; \
        echo 'post_max_size=50M'; \
        echo 'memory_limit=256M'; \
        echo 'date.timezone=UTC'; \
    } > /usr/local/etc/php/conf.d/uploads.ini

COPY src/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
