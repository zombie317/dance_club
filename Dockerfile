FROM yiisoftware/yii2-php:7.4-fpm

RUN export DEBIAN_FRONTEND=noninteractive \
    && apt-get update \
    && apt-get install -y \
        librabbitmq-dev libldb-dev libldap2-dev libssh-dev libmemcached-dev \
    && docker-php-ext-install bcmath sockets \
    && docker-php-ext-install ldap \
    && pecl install amqp \
    && pecl install memcached \
    && docker-php-ext-enable amqp \
    && docker-php-ext-enable ldap \
    && docker-php-ext-enable memcached 

RUN ln -sf /usr/share/zoneinfo/Europe/Moscow  /etc/localtime \
    && echo "Europe/Moscow" > /etc/timezone \
    && dpkg-reconfigure -f noninteractive tzdata

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql
 
WORKDIR /var/www/html
 
CMD ["php-fpm"]