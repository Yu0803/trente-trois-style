# ---- 1) Frontend assets build (Node) ----
FROM node:20 AS assets
WORKDIR /app

# 依存インストール
COPY package*.json ./
RUN npm ci

# Vite に必要なファイルだけコピーしてビルド
COPY vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm run build   # => public/build/ に manifest.json など生成

# ---- 2) PHP (Laravel) runtime ----
FROM php:8.2-cli

# 必要ライブラリ & PHP拡張
RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    libpng-dev \
    sqlite3 \
    libsqlite3-dev \
    pkg-config \
 && docker-php-ext-install zip pdo pdo_sqlite bcmath gd

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# アプリ
WORKDIR /app
COPY . .
RUN composer install --no-dev --optimize-autoloader

# Nodeで作った本番アセットを取り込み
COPY --from=assets /app/public/build /app/public/build

# Laravel が書けるように
RUN chmod -R 777 storage bootstrap/cache || true

# Entrypoint
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 10000
CMD ["/entrypoint.sh"]
