#!/bin/bash

if [[ ! -f .env ]]; then
  echo -e "STEP: creating .env file"

  cp -v .env.example .env
  sed -i 's/DB_HOST=.*/DB_HOST=mysql-db/' .env
  sed -i 's/DB_DATABASE=.*/DB_DATABASE=molveno/' .env
  sed -i 's/DB_USERNAME=.*/DB_USERNAME=molveno/' .env
  sed -i 's/DB_PASSWORD=.*/DB_PASSWORD=molveno/' .env
  echo -e "UID=${UID}" >> .env
fi

echo -e "\nSTEP: cleaning up previous database data directory"
sudo rm -rfv "run/var/*"

echo -e "\nSTEP: clean up previous database data directory without sudo rights"
rm -rfv "run/var/*"

echo -e "\nSTEP: cleaning up previous docker-compose containers"
docker-compose down

echo -e "\nSTEP: docker-compose build/up"
docker-compose build && docker-compose up -d

echo -e "\nSTEP: execute composer install"
docker exec laravel-app bash -c "composer install"

echo -e "\nSTEP: execute artisan key:generate"
docker exec laravel-app bash -c "php artisan key:generate"

# sleep for 5 seconds before seeding the database
echo -e "\nsleeping for 5 seconds"
sleep 5

echo -e "\nSTEP: execute artisan migrate:fresh and seed the database"
docker exec laravel-app bash -c "php artisan migrate:fresh --seed"
