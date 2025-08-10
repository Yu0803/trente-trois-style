# PHP 8.2 の公式イメージを使う
FROM php:8.2-cli

# 必要なライブラリをインストール
RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    libpng-dev \
 && docker-php-ext-install zip pdo pdo_sqlite bcmath gd

# Composer をインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 作業ディレクトリ
WORKDIR /app

# プロジェクトのファイルを全部コピー
COPY . .

# Laravel の依存関係をインストール
RUN composer install --no-dev --optimize-autoloader

# キャッシュやマイグレーションなど
RUN php artisan key:generate --force
RUN php artisan migrate --force || true
RUN php artisan storage:link || true
RUN php artisan config:cache
RUN php artisan route:cache

# ポート指定
EXPOSE 10000

# 起動コマンド
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
