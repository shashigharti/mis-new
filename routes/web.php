<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [
    'as' => 'website.home',
    'uses' => 'Controller@home'
]);

Auth::routes(['verify' => true]);

Route::get('/info',function (){
    phpinfo();
});
