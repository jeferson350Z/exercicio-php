FROM php:8.4-apache

# Instalar extensões do PHP para o MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite no Apache
RUN a2enmod rewrite

# Copiar arquivos do código para o container
COPY src/ /var/www/html/

# Ajustar permissões
RUN chown -R www-data:www-data /var/www/html
