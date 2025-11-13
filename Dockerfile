# Usamos PHP con FPM y extensiones necesarias
FROM php:8.3-fpm

# Instalar dependencias del sistema y extensiones PHP necesarias
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libjpeg-dev libfreetype6-dev zip unzip libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring gd

# Instalar Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Copiar archivos de proyecto
COPY . .

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Permisos para storage y bootstrap
RUN chown -R www-data:www-data storage bootstrap/cache

# Puerto expuesto
EXPOSE 8000

# Comando para correr migraciones y servidor de Laravel
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
