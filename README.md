# Molveno Lake Resort video app

This app uses the Laravel framework.
You do not need to have Laravel installed globally.

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
