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

// Route for Manager Role
Route::get('/manager/categories','ManagerController@viewCategories')->name('manager_categories');
Route::delete('/manager/categories','ManagerController@deleteCategory');

Route::get('/manager/category/{id?}','ManagerController@viewCategory')->name('manager_categories_update');
// Route::put('/manager/category/{id?}','ManagerController@updateCategory');

//Update Category
Route::get('/manager/category/{id}', 'ManagerController@updateFormCategories')->name('updateCategories');
Route::post('/manager/category/{id}', 'ManagerController@updateCategory')->name('updateFormCategories');

//View Product
Route::get('/viewProduct/{id}', 'ManagerController@viewProduct')->name('view_product');
Route::delete('/viewProduct/{id}', 'ManagerController@deleteProduct');