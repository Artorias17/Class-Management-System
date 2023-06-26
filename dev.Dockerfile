FROM php:8.1 as php

# Adding PostgreSQL driver and PHP extensions for postgresql
RUN apt-get update -y  \
    && apt-get install -y libpq-dev unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Copying over the composer binaries from composer docker image's /usr/bin/composer into this container
COPY --from=composer /usr/bin/composer /usr/bin/composer

ENTRYPOINT ["scripts/dev.entrypoint.sh"]
