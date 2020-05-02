FROM composer:1.10

RUN apk add --no-cache libpng libpng-dev && docker-php-ext-install gd && apk del libpng-dev

CMD ["composer"]