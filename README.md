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
DO NPM Install
```npm install```

### Or do below manually
Install Composer
`composer install`

Generate Key
`php artisan key:generate`

Clear config
`php artisan config:clear`



# Logging In
Preparation: Must run `composer fixture:dump` first from app container

Login first with this Super Admin Account
```
SUPER ADMIN
user: superadmin@example.com
pass: 123123
```

[Usage Sample](https://gyazo.com/2c617459a0bf548bd511e15f013c5290)

# Unit Tests
Preparation: Create test_shopmall database in your local

Example on how to run test inside app container
`vendor/bin/phpunit tests/Unit/Services`

# Testing Door Sensor API
```
URL: http://localhost/api/door-sensor
Type: POST
data: shopmall_id
```

[Image](https://gyazo.com/2a5eaec99155df1ad66f0474495a53cc)

