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

Route::get('/', 'HomeController@index')->name('home');

// Route Authentication for user
Route::post('/logout', 'Auth\LogoutController@store')->name('logout');

//Login
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@store');

//Register
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@store');

// Change password for user
Route::get('/password','Auth\ChangePassword@index')->name('change_password');
Route::put('/password','Auth\ChangePassword@store');

// Route for category
Route::get('/manager/categories','ManagerController@viewCategories')->name('manager_categories');
Route::delete('/manager/categories','ManagerController@deleteCategory');

//Add Category
Route::get('/add/flower','ManagerController@FormAddFlower')->name('add_flower');
Route::post('/create/flower','ManagerController@addFlower');

Route::get('/manager/category/{id?}','ManagerController@viewCategory')->name('manager_categories_update');
// Route::put('/manager/category/{id?}','ManagerController@updateCategory');

//Update Category
Route::get('/manager/category/{id}', 'ManagerController@updateFormCategories')->name('updateCategories');
Route::post('/manager/category/{id}', 'ManagerController@updateCategory')->name('updateFormCategories');

//View Flower
Route::get('/viewProduct/{id}', 'HomeController@viewProduct')->name('view_product');
Route::delete('/viewProduct/{id}', 'HomeController@deleteProduct');

//Search Flower
Route::get('/viewProduct/{id}/cari', 'HomeController@cari')->name('search_product');

//Detail Flower
Route::get('/detailProduct/{id}', 'HomeController@detailProduct')->name('detail_product');
Route::post('/detailProduct/{id}', 'HomeController@addToCart');

//Update Flower
Route::get('/viewProduct/edit/{id}','ManagerController@edit')->name('edit_product');
Route::post('/viewProduct/update/{id}','ManagerController@update')->name('update_product');

//Delete Flower
Route::get('/viewProduct/delete/{id}','ManagerController@delete')->name('delete_product');

// Cart
Route::get('/carts', 'UserController@viewCart')->name('view_cart');
Route::put('/carts', 'UserController@updateCart');
Route::get('/carts/checkout', 'UserController@checkoutCart')->name('checkout_cart');

// transaction history
Route::get('/transactions','UserController@viewTransactions')->name('view_transactions');

// detail transaction history
Route::get('/transaction/{id}','UserController@viewDetailTransaction')->name('view_detail_transaction');
