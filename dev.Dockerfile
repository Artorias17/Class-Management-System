FROM php:8.2 as php

# Adding PostgreSQL driver and PHP extensions for postgresql
RUN apt-get update -y \
    && apt-get install -y libpq-dev unzip git \
    && docker-php-ext-install pdo pdo_pgsql

# Copy Node.js and npm binaries from Node.js image
COPY --from=node:lts-slim /usr/local/bin/node /usr/local/bin/
COPY --from=node:lts-slim /usr/local/lib/node_modules /usr/local/lib/node_modules
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm \
    && ln -s /usr/local/lib/node_modules/npm/bin/npx-cli.js /usr/local/bin/npx

# Copying over the composer binaries from composer docker image's /usr/bin/composer into this container
COPY --from=composer /usr/bin/composer /usr/bin/composer

CMD ["bash"]