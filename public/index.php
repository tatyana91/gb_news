<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    require __DIR__.'/../storage/framework/maintenance.php';
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = tap($kernel->handle(
    $request = Request::capture()
))->send();

$kernel->terminate($request, $response);

//php artisan make:command Savejson
//php artisan save:json
//php artisan storage:link
//php artisan make:migration create_news_table --create=news
//php artisan make:model News -m
//php artisan migrate
//php artisan migrate:rollback
//php artisan make:seeder NewsSeeder
//php artisan db:seed
//php artisan db:seed --class=NewsSeeder
//composer dump-autoload
//php artisan cache:clear
//php artisan route:clear
//php artisan view:clear
//php artisan config:cache
//php artisan migrate:fresh --seed
//composer require barryvdh/laravel-debugbar --dev
//php artisan make:factory NewsFactory --model=News
//php artisan make:request NewsRequest
//php artisan make:rule Ember
//composer require --dev laravel/dusk
//php artisan dusk:install
//php artisan dusk
//php artisan dusk:make AddNewsTest
//php artisan make:middleware CheckIsAdmin
//php artisan make:controller Admin\ProfileController
//php artisan make:controller Admin\ParserController
//composer require socialiteproviders/vkontakte
//composer require socialiteproviders/github
//https://socialiteproviders.com/

