#!/usr/bin/env bash
set -e
cd /app

# .env を用意（なければ最小構成を作成）
if [ ! -f .env ]; then
  cat > .env <<'EOF'
APP_ENV=production
APP_DEBUG=false
APP_URL=${APP_URL}
DB_CONNECTION=sqlite
DB_DATABASE=/app/database/database.sqlite
LOG_CHANNEL=stderr
SESSION_DRIVER=file
CACHE_DRIVER=file
CACHE_STORE=file
EOF
fi

# APP_KEY を確実にセット
if grep -q '^APP_KEY=' .env; then
  : # 既に行がある
else
  if [ -n "$APP_KEY" ]; then
    echo "APP_KEY=${APP_KEY}" >> .env
  else
    php artisan key:generate --force || true
  fi
fi

php artisan config:clear || true
php artisan cache:clear  || true   # DBドライバでも落ちないように

# SQLite を用意 & 権限
[ -f database/database.sqlite ] || touch database/database.sqlite
chmod -R 777 storage bootstrap/cache || true

php artisan storage:link   || true
php artisan migrate --force || true
php artisan config:cache   || true
php artisan route:cache    || true

exec php artisan serve --host 0.0.0.0 --port ${PORT:-10000}
