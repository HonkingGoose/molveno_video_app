#/bin/bash

if [[ ! -f .env ]]; then
  cp -v .env.example .env
  sed -i 's/DB_HOST=.*/DB_HOST=mysql-db/' .env
  sed -i 's/DB_DATABASE=.*/DB_DATABASE=molveno/' .env
  sed -i 's/DB_USERNAME=.*/DB_USERNAME=molveno/' .env
  sed -i 's/DB_PASSWORD=.*/DB_PASSWORD=molveno/' .env
  echo "UID=${UID}" >> .env
fi

docker-compose down

docker-compose build && docker-compose up -d
docker exec laravel-app bash -c "composer install"
docker exec laravel-app bash -c "php artisan key:generate"
docker exec laravel-app bash -c "php artisan migrate:fresh --seed"