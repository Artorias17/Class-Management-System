FROM node:lts-slim as node

WORKDIR /home/app/cms

COPY . .

# Removing dev scripts because the start.sh from richarvey/nginx-php-fpm:2.1.2
# executes all scripts under scripts folder.
# See the start.sh to understand how everything works
# https://github.com/richarvey/nginx-php-fpm/blob/main/scripts/start.sh
# See also the Dockerfile
# https://github.com/richarvey/nginx-php-fpm/blob/main/Dockerfile

RUN apt-get update -y  \
    && rm -rf scripts/dev.entrypoint.sh \
    && npm i \
    && npm run prod

FROM richarvey/nginx-php-fpm:2.1.2 as server

COPY --from=node /home/app/cms .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]
