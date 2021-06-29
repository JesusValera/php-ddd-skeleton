FROM php:7.4.13-fpm-alpine
WORKDIR /app

RUN apk --update upgrade \
    && apk add --no-cache autoconf automake make gcc g++ icu-dev icu \
    && pecl install apcu-5.1.17 \
    && pecl install xdebug-3.0.2 \
    && docker-php-ext-install -j$(nproc) \
        intl \
        pdo_mysql \
        bcmath \
        opcache \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer --version

RUN docker-php-ext-enable apcu xdebug opcache

COPY etc/infrastructure/php/ /usr/local/etc/php/
