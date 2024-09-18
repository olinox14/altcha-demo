FROM php:8.2-apache

RUN apt-get update && apt-get install -y --fix-missing \
    apt-utils build-essential xorg wget bash gnupg zip nano git;

COPY /docker/api/vhost.conf /etc/apache2/sites-available/vhost.conf

RUN a2ensite vhost.conf; \
    a2enmod rewrite; \
    service apache2 start;

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"; \
    php composer-setup.php; \
    php -r "unlink('composer-setup.php');"; \
    mv composer.phar /usr/local/bin/composer;

######## XDebug ########
RUN pecl install xdebug; \
    docker-php-ext-enable xdebug;

WORKDIR /var/www/html

CMD ["apache2ctl", "-D", "FOREGROUND"]
