#!/usr/bin/env bash
# FleetHQ local preview — spins up WordPress (SQLite) and serves the theme.
# Usage: dev/preview.sh   (run from the theme repo root)
set -euo pipefail

THEME_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
WP_DIR="${WP_DIR:-$HOME/wp}"
PORT="${PORT:-8080}"
ADMIN_USER="${ADMIN_USER:-admin}"
ADMIN_PASS="${ADMIN_PASS:-admin12345}"
ADMIN_EMAIL="${ADMIN_EMAIL:-admin@fleethq.local}"

echo "▶ Theme:  $THEME_DIR"
echo "▶ WP dir: $WP_DIR"
echo "▶ Port:   $PORT"

# 1. WordPress core (GitHub mirror — wordpress.org is often blocked) ----------
if [ ! -f "$WP_DIR/wp-settings.php" ]; then
  echo "▶ Downloading WordPress core…"
  curl -sSL -o /tmp/wp.zip "https://codeload.github.com/WordPress/WordPress/zip/refs/heads/master"
  unzip -q -o /tmp/wp.zip -d /tmp/wpcore
  rm -rf "$WP_DIR"; mv /tmp/wpcore/WordPress-master "$WP_DIR"
fi

# 2. SQLite database integration (no MySQL needed) ----------------------------
if [ ! -d "$WP_DIR/wp-content/plugins/sqlite-database-integration" ]; then
  echo "▶ Installing SQLite integration plugin…"
  curl -sSL -o /tmp/sqlite.zip "https://codeload.github.com/WordPress/sqlite-database-integration/zip/refs/heads/main"
  unzip -q -o /tmp/sqlite.zip -d /tmp/sqlitep
  mkdir -p "$WP_DIR/wp-content/plugins"
  mv /tmp/sqlitep/sqlite-database-integration-main "$WP_DIR/wp-content/plugins/sqlite-database-integration"
fi
if [ ! -f "$WP_DIR/wp-content/db.php" ]; then
  cp "$WP_DIR/wp-content/plugins/sqlite-database-integration/db.copy" "$WP_DIR/wp-content/db.php"
  sed -i "s|{SQLITE_IMPLEMENTATION_FOLDER_PATH}|$WP_DIR/wp-content/plugins/sqlite-database-integration|g" "$WP_DIR/wp-content/db.php"
  sed -i "s|{SQLITE_PLUGIN}|sqlite-database-integration/load.php|g" "$WP_DIR/wp-content/db.php"
fi

# 3. Theme symlink (edits in the repo are live) -------------------------------
ln -sfn "$THEME_DIR" "$WP_DIR/wp-content/themes/fleethq"

# 4. wp-config.php ------------------------------------------------------------
if [ ! -f "$WP_DIR/wp-config.php" ]; then
  echo "▶ Writing wp-config.php…"
  cat > "$WP_DIR/wp-config.php" <<'CFG'
<?php
define( 'DB_NAME', 'wordpress' ); define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' ); define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' ); define( 'DB_COLLATE', '' );
$table_prefix = 'wp_';
define( 'WP_DEBUG', true ); define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false ); define( 'SCRIPT_DEBUG', true );
define( 'FS_METHOD', 'direct' );
define( 'AUTH_KEY','dk01' ); define( 'SECURE_AUTH_KEY','dk02' );
define( 'LOGGED_IN_KEY','dk03' ); define( 'NONCE_KEY','dk04' );
define( 'AUTH_SALT','ds05' ); define( 'SECURE_AUTH_SALT','ds06' );
define( 'LOGGED_IN_SALT','ds07' ); define( 'NONCE_SALT','ds08' );
if ( ! defined( 'ABSPATH' ) ) define( 'ABSPATH', __DIR__ . '/' );
require_once ABSPATH . 'wp-settings.php';
CFG
fi

# 5. Router for the built-in server -------------------------------------------
cat > "$WP_DIR/router.php" <<'RT'
<?php
$uri = urldecode( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ) );
$f = __DIR__ . $uri;
if ( $uri !== '/' && file_exists( $f ) && ! is_dir( $f ) ) return false;
require_once __DIR__ . '/index.php';
RT

# 6. Start server -------------------------------------------------------------
pkill -f "php -.*-S 127.0.0.1:$PORT" 2>/dev/null || true
( cd "$WP_DIR" && php -d display_errors=0 -S 127.0.0.1:"$PORT" router.php > /tmp/wp-server.log 2>&1 & )
sleep 2

# 7. Install WordPress (first run only) ---------------------------------------
if curl -sS "http://127.0.0.1:$PORT/wp-admin/install.php" | grep -qi "already been installed"; then
  echo "▶ WordPress already installed."
else
  echo "▶ Installing WordPress…"
  curl -sS "http://127.0.0.1:$PORT/wp-admin/install.php?step=2" \
    --data-urlencode "weblog_title=FleetHQ Dev" \
    --data-urlencode "user_name=$ADMIN_USER" \
    --data-urlencode "admin_password=$ADMIN_PASS" \
    --data-urlencode "admin_password2=$ADMIN_PASS" \
    --data-urlencode "pw_weak=1" \
    --data-urlencode "admin_email=$ADMIN_EMAIL" \
    --data-urlencode "blog_public=0" -o /dev/null
fi

# 8. Activate theme + scaffold pages ------------------------------------------
php "$THEME_DIR/dev/scaffold.php" "$WP_DIR"

echo ""
echo "✅ Preview ready:  http://127.0.0.1:$PORT/"
echo "   Admin:         http://127.0.0.1:$PORT/wp-admin/  ($ADMIN_USER / $ADMIN_PASS)"
