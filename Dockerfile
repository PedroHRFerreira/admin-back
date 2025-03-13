FROM php:8.2-apache

# Instalação de dependências e extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-install pdo_mysql mbstring zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configura Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN a2enmod rewrite
RUN service apache2 restart

# Diretório de trabalho
WORKDIR /var/www/html

# Copia arquivos do projeto para o container
COPY . .
COPY .env.example .env

# Instala dependências do Composer
RUN composer install --optimize-autoloader --no-dev --no-interaction --prefer-dist

# Gera chave da aplicação
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache

# Ajuste de permissões
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expondo a porta padrão 80
EXPOSE 80

CMD ["apache2-foreground"]
