APP_NAME=PPAgent
APP_ENV=production
APP_KEY=base64:M0ozitBczA5tWNWQFVDjHtaUuNy1CpO6+QOy/68R6Lg=
APP_DEBUG=true
APP_URL=https://ppmanagement.com.ng

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=ppmanagement_ppagent
DB_USERNAME='ppmanagement_root'	
DB_PASSWORD='#Pivot.Manage'

PUBLIC_KEY=FLWPUBK_TEST-654c125a8fb84a498a26e88006207a6b-X
SECRET_KEY=FLWSECK_TEST-cf0a2c3b02bfd24e00274b4aedbedec2-X
ENCRYPTION_KEY=FLWSECK_TEST2c5f630a5e85
ENV='staging/production'

PAYSTACK_PUBLIC_KEY=pk_test_aeb239c1402332dc262d56d7b1fab1d3b3450249
PAYSTACK_SECRET_KEY=sk_test_c5adadff66894219fad4623b3372522e23b350dd
PAYSTACK_PAYMENT_URL=https://api.paystack.co
MERCHANT_EMAIL=unicodeveloper@gmail.com

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=rextech03@gmail.com
MAIL_PASSWORD=4Christlove$
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="rextech03@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
