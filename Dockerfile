# Usa a imagem oficial do PHP com Apache
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

# Ativa o mod_rewrite do Apache para suportar URLs amigáveis do Laravel
RUN a2enmod rewrite

# Define o diretório de trabalho dentro do container
WORKDIR /var/www/html

# Copia os arquivos do projeto para o container
COPY . .

# Define o DocumentRoot para a pasta public do Laravel
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Ajusta permissões necessárias para o Laravel
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# Copia o arquivo .env.example para .env
COPY .env.example .env

# Instala as dependências do Composer
RUN composer install --optimize-autoloader --no-dev --no-interaction --prefer-dist

# Gera a chave da aplicação Laravel
RUN php artisan key:generate

# Cache de configurações e rotas para melhor desempenho
RUN php artisan config:cache
RUN php artisan route:cache

# Reinicia o Apache para aplicar mudanças
RUN service apache2 restart

# Expõe a porta padrão do Apache
EXPOSE 80

# Comando para iniciar o Apache no foreground
CMD ["apache2-foreground"]
