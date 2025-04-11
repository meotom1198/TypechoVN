# Dockerfile cho Typecho trên Render
FROM php:8.1-apache

# Cài các extension PHP cần thiết
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install mysqli zip gd \
    && apt-get clean

# Bật mod_rewrite của Apache
RUN a2enmod rewrite

# Copy mã nguồn vào thư mục web
COPY . /var/www/html/

# Chỉnh quyền thư mục cho Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Thiết lập thư mục làm việc mặc định
WORKDIR /var/www/html

# Expose port 80 (Render tự hiểu nhưng tốt khi dùng Docker ngoài)
EXPOSE 80
