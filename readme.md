##Install project:
- Download composer https://getcomposer.org/download/
- Download NodeJs https://nodejs.org/en/download/
- Pull Laravel/php project from git provider.
- Rename `.env.example` file to `.env`inside your project root and fill the database information.
  (windows wont let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
- Open the console and cd your project root directory
- Run `composer install` or ```php composer.phar install```
- Run `npm install`
- Run `php artisan key:generate` 
- Run `php artisan migrate`
- Run `php artisan db:seed`
- Run `php artisan serve`

#####You can now access your project at localhost:8000 :)


