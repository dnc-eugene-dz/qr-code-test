FROM php:8-fpm
RUN apt-get update && apt-get install -y \
        wget unzip \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
	    curl \
	    libzip-dev \
	    nano \
    && pecl install xdebug \
	&& apt-get install --no-install-recommends -y libzip-dev zlib1g \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install exif \
    && docker-php-ext-install zip \
    && docker-php-ext-enable xdebug
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && chmod 755 /usr/local/bin/composer