# PHP 8.2 の公式イメージを使う
FROM php:8.2-cli

# 必要なライブラリをインストール
RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    libpng-dev \
    sqlite3 \
    libsqlite3-dev \
    pkg-config \
 && docker-php-ext-install zip pdo pdo_sqlite bcmath gd

# Composer をインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 作業ディレクトリ
WORKDIR /app
COPY . .
RUN composer install --no-dev --optimize-autoloader

# Laravel が書き込めるよう権限
RUN chmod -R 777 storage bootstrap/cache || true

# エントリポイントを登録
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 10000
CMD ["/entrypoint.sh"]