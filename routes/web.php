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
    Route::get('profile/', 'UserController@index')->name('profile');
    Route::post('profile/reset/password', 'UserController@changePassword')->name('change_password');


});

Route::group(['middleware' => ['admin']], function () {
    
    Route::get('/register', 'RegisterController@index')->name('register');
    Route::post('/register', 'RegisterController@validateAndCreate')->name('register_post');

    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', 'AdminController@index')->name('admin');
        Route::get('/user/list', 'AdminController@users_list')->name('users_list');
        Route::get('/user/add', 'AdminController@user_add')->name('user_add');
        Route::get('/user/product/add', 'AdminController@user_add_product')->name('user_add_product');
        Route::get('/product/add', 'AdminController@product_add')->name('product_add');
        Route::get('/product/list', 'AdminController@products_list')->name('products_list');
        Route::get('/images/add', 'AdminController@image_add')->name('image_add');
        Route::get('/images/list', 'AdminController@images_list')->name('images_list');
        Route::get('/manager/waiting/{orderBy?}', 'AdminController@waiting_list')->name('waiting_list');
        Route::get('/manager/product', 'AdminController@manager_product')->name('manager_product');

        Route::post('/product/add', 'AdminController@addProduct')->name('admin_product_add');
        Route::post('/user/add/product', 'AdminController@addProductForUser')->name('admin_add_product_user');
        Route::get('/step/validate/{productuser}', 'AdminController@validateStep')->name('admin_validate_step');
        Route::get('/step/error/{productuser}', 'AdminController@errorStep')->name('admin_error_step');
        Route::get('/productuser/remove/{id}', 'AdminController@deleteProductUser')->name('admin_delete_productuser');
        Route::post('/add/image', 'ImageController@addImage')->name('admin_add_image');
        Route::get('/img/list', 'ImageController@listImages');

    });

});
