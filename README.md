[![Dependabot Status](https://api.dependabot.com/badges/status?host=github&repo=HonkingGoose/molveno_video_app)](https://dependabot.com)

# Molveno Lake Resort video app

This app uses the Laravel framework.
You do not need to have Laravel installed globally.

## About the docker files:

**WARNING: Do not use the docker files yet, this is work in progress and needs to be validated and checked!**

This repo is currently being changed so that we can use Docker. However this work is not done yet, **do not use any docker commands on this repo!**

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
