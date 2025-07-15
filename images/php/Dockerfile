# ========= ESTÁGIO 1: PHP com dependências ========= #
FROM php:8.3.14-fpm-alpine AS base

# Instala dependências do sistema e bibliotecas
RUN apk update && apk add --no-cache \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    git \
    unzip \
    icu-dev \
    libxml2-dev \
    openssl-dev \
    bash \
    curl \
    --virtual .build-deps gcc g++ make

# Instala extensões PHP necessárias
RUN docker-php-ext-install gd pdo pdo_mysql

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# ========= ESTÁGIO 2: Node.js oficial ========= #
FROM node:22-alpine AS node

# ========= ESTÁGIO FINAL: PHP + Node.js completo ========= #
FROM base

# Copia toda a instalação do Node.js e npm do container node:22-alpine
COPY --from=node /usr/local /usr/local
