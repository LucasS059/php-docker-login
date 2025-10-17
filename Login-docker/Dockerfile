# Usar a imagem oficial do PHP 8.2 com FPM
FROM php:8.2-fpm

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Instalar dependências do sistema e extensões do PHP necessárias para o Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    && docker-php-ext-install pdo_mysql bcmath gd

# Instalar o Composer (gerenciador de pacotes do PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar os arquivos existentes do projeto para dentro do contêiner
COPY . .

# Instalar as dependências do Laravel
RUN composer install

# Mudar a propriedade da pasta para o usuário do servidor web
RUN chown -R www-data:www-data storage bootstrap/cache

# Expor a porta 9000 para o serviço de FPM
EXPOSE 9000