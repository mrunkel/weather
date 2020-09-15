## Stage 1 (production base)
FROM dock.pfdev.de/public/php-nginx-base:latest as base

ENV APP_ENV=production
ENV PATH=/var/www/bin:$PATH

WORKDIR /var/www

COPY composer.* ./

RUN composer install --no-interaction --no-dev --no-scripts

## Stage 2 (development)
# we don't COPY in this stage because for dev you'll bind-mount anyway
# this saves time when building locally for dev via docker-compose
FROM base as dev

ENV APP_ENV=dev

COPY ./docker/dev-entrypoint.sh /usr/local/sbin/dev-entrypoint

WORKDIR /var/www/

ENTRYPOINT /usr/local/sbin/dev-entrypoint

CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

## Stage 3 (copy in source)
FROM base as source

WORKDIR /var/www

COPY --chown=www-data:www-data . .

## Stage 4 (tests)
#FROM source as test
#ENV APP_ENV=test
#ENV ENABLE_ENCRYPTION='false'
#
#COPY --from=dev /var/www/vendor /var/www/vendor
#
#RUN ./vendor/bin/parallel-lint src
#
#RUN console doctrine:database:drop --force -e test \
#    && console doctrine:database:create -e test \
#    && console doctrine:schema:create -e test
##    && console doctrine:fixtures:load --no-interaction -e test
#
#RUN ./vendor/bin/simple-phpunit -d memory_limit=512M


## Stage 5 (default, production)
# this will run by default if you don't include a target
# it has prod-only dependencies
# In BuildKit, this is skipped for dev and test stages
FROM source as prod

ENV APP_ENV=prod

RUN composer dump-autoload -o
RUN console cache:clear
RUN chown -R www-data:www-data ./var

CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
