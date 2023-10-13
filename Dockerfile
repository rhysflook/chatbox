#PHP 8.x RC2!


FROM php:8.2-apache

#Update!

RUN apt-get update
RUN apt-get update && apt-get install -y locales && locale-gen "ja_JP.UTF-8"
ENV LC_ALL ja_JP.UTF-8
ENV LANG ja_JP.UTF-8
ENV LANGUAGE ja_JP.UTF-8
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


#Install zip+icu dev libs + pgsql dev support
RUN apt-get install libzip-dev zip libicu-dev libpq-dev -y

#Install PHP extensions zip and intl (intl requires to be configured)
RUN docker-php-ext-install zip && docker-php-ext-configure intl && docker-php-ext-install intl

# Add MySQL and Postgres/pgsql support
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && docker-php-ext-install pdo_pgsql pgsql

# Add gd extension support
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev
RUN docker-php-ext-configure gd --with-jpeg
RUN docker-php-ext-install gd

RUN curl -sS https://getcomposer.org/installer​ | php -- \
    --install-dir=/usr/local/bin --filename=composer
#Required for htaccess rewrite rules
RUN a2enmod rewrite
RUN apt install nodejs npm
RUN pecl install xdebug \
&& docker-php-ext-enable xdebug

# COPY php.ini /usr/local/etc/php/php.ini

EXPOSE 8000
WORKDIR /app
COPY . .
RUN composer update
RUN npm install
