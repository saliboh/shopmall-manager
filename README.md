# Run Local Dev
```
docker-compose up -d
npm install
```

# Start the laravel app
Go inside container
`docker-compose exec app bash`

Run this command to handle all setup
```
composer dev:init
composer fixture:load
```

Or do below manually
Install Composer
`composer install`

Generate Key
`php artisan key:generate`

Clear config
`php artisan config:clear`

NPM Install
```npm install```

# Logging In
Preparation: Must run `composer fixture:dump` first from app container

Accounts
```
SUPER ADMIN
user: superadmin@example.com
pass: 123123

SHOP MANAGER
user: shop-manager@example.com
pass: 123123

SHOP MANAGER
user: store-owner@example.com
pass: 123123
```

# Unit Tests
Preparation: Create test_shopmall database in your local

Example on how to run test inside app container
`vendor/bin/phpunit tests/Unit/Services`
