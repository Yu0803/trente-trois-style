#!/usr/bin/env bash
set -e
cd /app

# .env を用意
if [ ! -f .env ]; then
  printf "APP_ENV=production\nAPP_DEBUG=false\nDB_CONNECTION=sqlite\nLOG_CHANNEL=stderr\nSESSION_DRIVER=file\nCACHE_DRIVER=file\n" > .env
fi

# キャッシュ整理 & APP_KEY（無ければ発行）
php artisan config:clear || true
php artisan cache:clear || true
if ! grep -q '^APP_KEY=' .env || [ -z "$(grep '^APP_KEY=' .env | cut -d= -f2-)" ]; then
  php artisan key:generate --force || true
fi

# SQLite 用意 & 権限
[ -f database/database.sqlite ] || touch database/database.sqlite
chmod -R 777 storage bootstrap/cache || true

# リンク/マイグレ/キャッシュ
php artisan storage:link || true
php artisan migrate --force || true
php artisan config:cache || true
php artisan route:cache || true

# 起動
exec php artisan serve --host 0.0.0.0 --port ${PORT:-10000}
