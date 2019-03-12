<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

if (!empty($_GET)) {
    $fw = fopen($_SERVER['DOCUMENT_ROOT']."/../logs.log", "a+");
    fwrite($fw, "[GET]"."[".date(DATE_RFC822)."]"."[".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."] ".var_export($_GET, true)." \r\n");
    fclose($fw);
}

if (!empty($_POST)) {
    $fw = fopen($_SERVER['DOCUMENT_ROOT']."/../logs.log", "a+");
    fwrite($fw, "[POST]"."[".date(DATE_RFC822)."]"."[".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."] ".var_export($_POST, true)." \r\n");
    fclose($fw);
}

Route::get('/', 'indexPage@redirect');

Route::get('/index.html', 'indexPage@index');

Route::post('/getNewInfo', 'indexPage@getNewInfo');


Route::get('/form.html', 'formPage@index');

Route::post('/form.html', 'formPage@insertData');

Route::get('/cron', 'cornRoute@index');


Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
