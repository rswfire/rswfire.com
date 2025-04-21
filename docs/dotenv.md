# @rswfire > dotenv

[![PHP](https://img.shields.io/badge/PHP-8.3.6-blue)](https://php.net)
[![Laravel](https://img.shields.io/badge/Laravel-12.9.2-blueviolet)](https://laravel.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-orange)](https://mysql.com)
[![Developer](https://img.shields.io/badge/Creator-@rswfire-red)](https://github.com/rswfire)
[![Documentation](https://img.shields.io/badge/Documentation-lightgrey)](/docs/readme.md)

When first installing and configuring this project, you should copy the code below into an `.env` file in the root
of your project.

If you are responsible for adding a new environment variable to the project, please remember
to update this template when you do so and notify others.

For readability and maintainability, we always organize our environment variables alphabetically.

## Syntax Legend

* `(empty)` → _Valid dotenv notation_. Leave this literal token as-is. It signals an optional variable with no value set.
* `(null)` → _Valid dotenv notation_. Leave this as-is to explicitly mark null intent (interpreted by your application logic).
* `(true|false)` → _Valid dotenv boolean placeholder_. Leave as-is unless setting a value.
* `""` → _A value is expected but not explicitly provided_. Replace with a string literal or variable.
* `"quoted"` → Use double quotes around all string values (this is enforced for clarity and consistency).
* `${VAR_NAME}` → Variable interpolation from another entry above (used in `VITE_*` variables, etc).

## .env

```dotenv
APP_DEBUG=(true)
APP_ENV="local"
APP_KEY="base64:"
APP_NAME="rswfire"
APP_URL="https://rswfire.local"

AWS_ACCESS_KEY_ID=(empty)
AWS_DEFAULT_REGION="us-west-2"
AWS_S3_BUCKET=(empty)
AWS_S3_ENDPOINT=(empty)
AWS_S3_URL=(empty)
AWS_SECRET_ACCESS_KEY=(empty)
AWS_USE_PATH_STYLE_ENDPOINT=(false)

DB_CONNECTION="mysql"
DB_HOST="localhost"
DB_PORT=3307
DB_DATABASE="rswfire"
DB_USERNAME="webuser"
DB_PASSWORD=""

LARAVEL_BROADCAST_DRIVER="log"
LARAVEL_CACHE_DRIVER="file"
LARAVEL_CACHE_PREFIX=(null)
LARAVEL_FILESYSTEM_DISK="local"
LARAVEL_QUEUE_CONNECTION="sync"
LARAVEL_SCOUT_DRIVER="meilisearch"

LOG_CHANNEL="stack"
LOG_DEPRECATIONS_CHANNEL=(null)
LOG_LEVEL="debug"

MAIL_ENCRYPTION="tls"
MAIL_FROM_ADDRESS="rsw@rswfire.com"
MAIL_FROM_NAME="${APP_NAME}"
MAIL_HOST="localhost"
MAIL_MAILER="smtp"
MAIL_PASSWORD=(empty)
MAIL_PORT=25
MAIL_USERNAME=(empty)

MEMCACHED_HOST="localhost"
MEMCACHED_PASSWORD=(empty)
MEMCACHED_PERSISTENT_ID=(null)
MEMCACHED_PORT=11211
MEMCACHED_USERNAME=(empty)

PUSHER_APP_CLUSTER="mt1"
PUSHER_APP_ID=(empty)
PUSHER_APP_KEY=(empty)
PUSHER_APP_SECRET=(empty)
PUSHER_HOST=(empty)
PUSHER_PORT=443
PUSHER_SCHEME="https"

REDIS_CACHE_DB=(null)
REDIS_CLIENT=(null)
REDIS_CLUSTER=(empty)
REDIS_DB=(empty)
REDIS_HOST="localhost"
REDIS_PREFIX=(empty)
REDIS_PASSWORD=(empty)
REDIS_PORT=6379
REDIS_URL=(empty)
REDIS_USERNAME=(empty)

SERVICES_MEILISEARCH_HOST=""
SERVICES_MEILISEARCH_KEY=""
SERVICES_SENTRY_LARAVEL_DSN=""
SERVICES_SENTRY_TRACES_SAMPLE_RATE=""

SESSION_COOKIE="rswfire"
SESSION_CONNECTION=(null)
SESSION_DB_TABLE=(empty)
SESSION_DOMAIN=".rswfire.local"
SESSION_DRIVER="database"
SESSION_LIFETIME=120
SESSION_SECURE_COOKIE=(false)
SESSION_STORE=(empty)

VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_SENTRY_DSN_PUBLIC="${SENTRY_LARAVEL_DSN}"
```

---
dotenv.md |
[readme.md](/docs/readme.md) |
[setup.md](/docs/setup.md)
