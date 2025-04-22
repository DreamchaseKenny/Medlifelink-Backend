FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    libpq-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions (add pgsql and pdo_pgsql)
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory
COPY . /var/www/

# Copy .env.example to .env
RUN cp .env.example .env

# Install dependencies
RUN composer install --no-interaction --optimize-autoloader

# Generate application key (without optimizing)
RUN php artisan key:generate

# Set permissions
RUN chmod -R 777 /var/www/storage /var/www/bootstrap/cache

# Install and build frontend assets if needed
RUN if [ -f package.json ]; then npm install && npm run build; fi

# Expose port 8000
EXPOSE 8000

# Start command
CMD php artisan serve --host=0.0.0.0 --port=8000
