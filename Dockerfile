# Dockerfile cho Typecho trên Render
FROM php:8.1-apache

# Cài các extension PHP cần thiết
RUN apt-get update && apt-get install -y \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev libzip-dev unzip git \
    && docker-php-ext-install mysqli zip gd

# Bật mod_rewrite của Apache
RUN a2enmod rewrite

# Copy mã nguồn vào thư mục web
COPY . /var/www/html/

# Chỉnh quyền
RUN chown -R www-data:www-data /var/www/html

# Set thư mục làm việc
WORKDIR /var/www/html
