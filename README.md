# README.md

An administration panel for [Trojan](https://github.com/trojan-gfw/trojan) ‘VPN’ based on Laravel 11

## Installation

1. `composer install` to install PHP libraries → vendor/
2. `npm install` to install JS libraries库 → node_modules/
3. `npm run build` from the JS libraries, generate static files for production → public/build/

or use `npm run dev` to run a Vite service to assist development. This Vite service will scan the front-end code in the project in real-time and automatically regenerate the CSS/JS files → public/build/

## Deployment

1. `composer install --optimize-autoloader --no-dev` Only install the PHP dependencies needed for production and remove the dependencies only for development, such as Debugbar
2. `npm install --production` Only install the JS dependencies needed for production
3. `npm run build` generate static files for production → public/build/
4. Copy the project to your server
5. Modify `.env` config file, set `APP_ENV=production`
6. [Optional] In the project directory
`php artisan key:generate` to regenerate APP_KEY in `.env` file
`php artisan config:cache` regenerate config cache
`php artisan route:cache` regenerate routes cache
`php artisan view:cache` regenerate views cache

## Database

Add these two scheduled tasks to the Database

1. Every month, auto-calculate total_download, and total_upload, and reset download, and upload fields 
    
    ```sql
    UPDATE db_name.users
    SET 
        total_download = total_download + download, 
        total_upload = total_upload + upload,
        download = 0,
        upload = 0
    WHERE upload != 0 OR download != 0;
    ```
    
2. Every N minute, check the expire_at field for every user and clear the quota if it’s expired
    
    ```sql
    UPDATE db_name.users
    SET 
        quota = 0
    WHERE expire_at < NOW();
    ```
    

## Dependencies

1. [Laravel 11](https://laravel.com/)
2. [Tailwind CSS](https://tailwindcss.com/)
3. [Flowbite](https://flowbite.com/)
4. [flatpickr](https://flatpickr.js.org/)

## Todo