#!/bin/sh
set -e

# is xdebug installed?
if [ ! -f "/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini" ] ; then
    # no, then install and configure xdebug
    echo "Installing xdebug"
    pecl install xdebug >/dev/null
    echo "Enabling xdebug"
    docker-php-ext-enable xdebug
    echo "setting xdebug config"
    { \
        echo xdebug.remote_enable=on; \
        echo xdebug.remote_autostart=off; \
        echo xdebug.remote_port=9000; \
        echo xdebug.remote_handler=dbgp; \
        echo xdebug.remote_connect_back=0; \
        echo xdebug.idekey=kirby; \
        echo xdebug.remote_host=host.docker.internal; \
    } >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
fi
# run last minute build tools just for local dev
echo "Running composer install and generating autoloader"
cd /var/www
composer install --no-scripts --no-autoloader --ansi --no-interaction
composer dump-autoload
cd /var/www

if [ "$@" == "" ]; then
    exec "$@"
else
    /usr/bin/supervisord -n -c /etc/supervisor/conf.d/supervisord.conf
fi
