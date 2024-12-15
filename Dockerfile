FROM php:8.2-cli

WORKDIR /var/www

COPY . .

RUN apt-get update && apt-get install -y sqlite3 libsqlite3-dev

# Instalar extensões necessárias
RUN docker-php-ext-install pdo pdo_sqlite

# Comando inicial para o servidor embutido do PHP
CMD php -S 0.0.0.0:8000 -t public
