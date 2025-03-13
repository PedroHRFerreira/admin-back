# Imagem base com PHP 8.2 e Apache
FROM php:8.2-apache

# Atualiza pacotes e instala dependências necessárias para o Laravel
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

# Copia o Composer da imagem oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia todos os arquivos do projeto para o container
COPY . .

# Copia o arquivo .env para o contêiner
COPY .env .env

# Instala as dependências do Composer
RUN composer install --optimize-autoloader --no-dev --no-interaction --prefer-dist

# Gera a chave da aplicação (caso ainda não exista)
RUN php artisan key:generate

# Otimiza o cache de configuração e de rotas
RUN php artisan config:cache
RUN php artisan route:cache

# Ajusta as permissões para os diretórios de armazenamento e cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta 80 (padrão do Apache)
EXPOSE 80

# Comando para iniciar o Apache
CMD ["apache2-foreground"]
