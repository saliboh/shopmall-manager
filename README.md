# Run Local Dev
docker-compose up -d

# Start the laravel app
Go inside container
`docker-compose exec app bash`

Install Composer
`composer install`

Generate Key
`php artisan key:generate`

Clear config
`php
