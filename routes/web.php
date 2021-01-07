<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'LoginController@index')->name('login');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('login', 'LoginController@authenticate')->name('login_post');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', 'LogoutController@logout')->name('logout');

    Route::get('home', 'HomeController@index')->name('home');

    Route::get('product/{id}', 'ProductController@index')->name('product');

    Route::get('user/product/step/{product}', 'ProductController@ChangeStep')->name('change_step');
    Route::post('user/product/post/step/', 'ProductController@ChangeStepPost')->name('change_steppost');


});

Route::group(['middleware' => ['admin']], function () {
    
    Route::get('/register', 'RegisterController@index')->name('register');
    Route::post('/register', 'RegisterController@validateAndCreate')->name('register_post');

    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', 'AdminController@index')->name('admin');
        Route::post('/product/add', 'AdminController@addProduct')->name('admin_product_add');
        Route::post('/user/add/product', 'AdminController@addProductForUser')->name('admin_add_product_user');
        Route::get('/step/validate/{productuser}', 'AdminController@validateStep')->name('admin_validate_step');
        Route::get('/step/error/{productuser}', 'AdminController@errorStep')->name('admin_error_step');
        Route::post('/add/image', 'ImageController@addImage')->name('admin_add_image');
        Route::get('/img/list', 'ImageController@listImages');

    });

});
