FROM php:7.1-fpm
RUN apt-get update \
  && apt-get install --yes --no-install-recommends libpq-dev \
  && docker-php-ext-install pdo_mysql