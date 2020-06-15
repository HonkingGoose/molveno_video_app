[![Dependabot Status](https://api.dependabot.com/badges/status?host=github&repo=HonkingGoose/molveno_video_app)](https://dependabot.com)
![Laravel](https://github.com/HonkingGoose/molveno_video_app/workflows/Laravel/badge.svg)

# Molveno Lake Resort video app

This app uses the Laravel framework.
You do not need to have Laravel installed globally.

## Repo status

This repository is in archived mode.
This project will not receive any more bugfixes/security updates/features.

## About using Docker with this repository:

You can use the `up.sh` shell script to create the docker container.
There are helper shell scripts to use Composer to install dependencies, use php-artisan commands and phpunit commands.

## Prerequisites:

- XAMPP is installed.
- PHP is in your $PATH.
- Composer is installed. Put Composer in your $PATH too.

## What to do after cloning the repo:

Ensure the prerequisites are met.
Copy the `.env.example` file and rename it `.env`, keep the file in the root directory of the repo.

Execute the following commands:
- `composer install`
- `npm install`
- `php artisan key:generate`
- `php artisan cache:clear`
- `php artisan config:clear`
- `php artisan migrate:refresh`

## How to start the server:

`php artisan serve` opens a local development server at http://localhost:8000

## If you get errors:

1. Try `composer dump-autoload` to load the classes of directories outside of `/app`.
