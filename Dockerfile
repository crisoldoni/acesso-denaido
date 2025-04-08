FROM php:8.3-fpm

# Argumentos para configurar o usuário
ARG user=laravel
ARG uid=1000

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libcurl4-openssl-dev \
    libssl-dev \
    libpq-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip sockets

# Limpa cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala o Redis
RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cria o usuário
RUN useradd -G www-data,root -u $uid -d /home/$user $user \
    && mkdir -p /home/$user/.composer \
    && chown -R $user:$user /home/$user

# Define diretório de trabalho
WORKDIR /var/www

# Copia configurações PHP personalizadas (opcional)
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Copia arquivos da aplicação Laravel (você pode ignorar essa parte no .dockerignore)
COPY . /var/www

# Ajusta permissões para diretórios usados pelo Laravel
RUN chown -R $user:www-data /var/www \
    && find /var/www -type f -exec chmod 664 {} \; \
    && find /var/www -type d -exec chmod 775 {} \; \
    && chown -R $user:www-data /var/www/storage /var/www/bootstrap/cache

# Define o usuário padrão
USER $user
