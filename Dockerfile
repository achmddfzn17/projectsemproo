FROM php:8.4-cli-alpine

# Install system dependencies
RUN apk add --no-cache \
    git \
    curl \
    zip \
    unzip \
    nodejs \
    npm \
    sqlite-dev \
    libpng-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libzip-dev \
    oniguruma-dev

# Configure GD extension
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev --no-interaction

# Install & build frontend
RUN npm ci --omit=dev && npm run build

# Cache Laravel config
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Fix storage permissions
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
