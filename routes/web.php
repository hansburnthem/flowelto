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
Route::get('/add/flower','AddFlowerController@FormAddFlower')->name('add_flower');
Route::post('/create/flower','AddFlowerController@addFlower');

Route::get('/manager/category/{id?}','ManagerController@viewCategory')->name('manager_categories_update');
// Route::put('/manager/category/{id?}','ManagerController@updateCategory');

//Update Category
Route::get('/manager/category/{id}', 'ManagerController@updateFormCategories')->name('updateCategories');
Route::post('/manager/category/{id}', 'ManagerController@updateCategory')->name('updateFormCategories');

//View Product
Route::get('/viewProduct/{id}', 'ViewProductController@viewProduct')->name('view_product');
Route::delete('/viewProduct/{id}', 'ViewProductController@deleteProduct');

//Search Product
Route::get('/viewProduct/{id}/cari', 'ViewProductController@cari')->name('search_product');

//Detail Product
Route::get('/detailProduct/{id}', 'FlowerDetailController@detailProduct')->name('detail_product');

//Update Product
Route::get('/viewProduct/edit/{id}','UpdateProductController@edit')->name('edit_product');
Route::post('/viewProduct/update/{id}','UpdateProductController@update')->name('update_product');