FROM php:8.0-fpm

RUN apt update \
    && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
    && docker-php-ext-install pdo_mysql zip

RUN apt-get update && \apt-get install -y cron

COPY cron.root /etc/cron.daily/cron

RUN chmod 0644 /etc/cron.daily/cron && ln -sf /proc/1/fd/1 /var/log/cron.log

WORKDIR /var/www

CMD cron -f