<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


/*
 * Locale Endpoint
 */
$app->group(['namespace' => 'App\Http\Controllers\Locale', 'prefix' => 'locale'], function ($app) {
    /** @var \Laravel\Lumen\Application $app */
    $app->get('/', 'LocaleController@getAll');
});



/*
 * Key Endpoint
 */
$app->group(['namespace' => 'App\Http\Controllers\Key', 'prefix' => 'key'], function ($app) {
    /** @var \Laravel\Lumen\Application $app */
    $app->get('/', 'KeyController@getAll');
});


/*
 * Messages Endpoint
 */
$app->group(['namespace' => 'App\Http\Controllers\Message', 'prefix' => 'message'], function ($app) {
    /** @var \Laravel\Lumen\Application $app */
    $app->get('/', 'MessageController@getIndex');
});


/*
 * Translation Endpoint
 */
$app->group(['namespace' => 'App\Http\Controllers\Translator'], function ($app) {
    /** @var \Laravel\Lumen\Application $app */
    $app->get('/', 'TranslatorController@getIndex');
});
