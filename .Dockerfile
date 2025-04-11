# Sử dụng image PHP có tích hợp FPM
FROM php:8.1-fpm

# Cài đặt các extension PHP cần thiết cho Typecho
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    zip \
    wget \
    nginx \
    mariadb-client \
    && docker-php-ext-install pdo pdo_mysql mbstring zip gd

# Tạo thư mục chạy Nginx
RUN mkdir -p /var/www/html

# Tải Typecho (phiên bản stable mới nhất)
RUN wget https://github.com/typecho/typecho/releases/download/v1.2.1/typecho.zip \
    && unzip typecho.zip -d /var/www/html \
    && rm typecho.zip

# Copy config Nginx
COPY default.conf /etc/nginx/conf.d/default.conf

# Phân quyền cho www-data
RUN chown -R www-data:www-data /var/www/html

# Expose port
EXPOSE 80

# Start nginx + php-fpm khi container chạy
CMD service nginx start && php-fpm
