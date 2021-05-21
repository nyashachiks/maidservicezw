# production environment
FROM php:apache
RUN docker-php-ext-install mysqli
RUN rm -rf /etc/apache2/sites-available/000-default.conf
COPY ./vhost.conf /etc/apache2/sites-available/000-default.conf
COPY . /app/public/
RUN chown -R www-data:www-data /app && a2enmod rewrite
