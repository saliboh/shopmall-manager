# QUICK START

### Prepare local environment
```
docker-compose up -d
npm install
```

### Start the laravel app
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

Stor Owner Account
user: store-owner@example.com
pass: 123123

Shopping Mall Manager Account
user: store-owner@example.com
pass: 123123
```

# Unit Tests
Preparation: Create test_shopmall database in your local

Example on how to run test inside app container
`vendor/bin/phpunit tests/Unit/Services`
`vendor/bin/phpunit tests/Unit/Http`

# Door Sensor Api
```
URL: http://localhost/api/door-sensor
Type: POST
data: {
    id, // Must be Store Owner
    visit // Total number of visitor count stored in the door sensor
}
```

# User API
```
Login: http://localhost/api/login
Type: Post
Data: //See App\Http\Requests\AuthUserLoginRequest
Response Sample
{
    "user": {
        "id": 1,
        "name": "Super Admin",
        "email": "superadmin@example.com",
        "email_verified_at": "2021-09-09T08:24:13.000000Z",
        "created_at": "2021-09-09T08:24:13.000000Z",
        "updated_at": "2021-09-09T08:24:13.000000Z",
        "role": "super-admin"
    },
    "token": "2|jvoHHQsfOan2YY1ZTFV1DEQZNjQbTC4k8ls9yDxh",
    "success": true,
    "message": "User login successfully"
}
```

# Other APIs
- User Register, Delete Update, Edit, Update
- Shops Create, Delete, Update, Edit, Update

Links: Please refer to `routes/web.php` and `routes/api.php`
Required POST/PATCH/DELETE/GET Data, Please refer to `app\Http\Requests` from its respective `Controllers`
