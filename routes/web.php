<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function (){
    return redirect(\route('orders'));
});

Auth::routes();

Route::get('/error/{errorId}', 'Controller@error')->name('error')->middleware('auth');

Route::get('/orders', 'OrderController@index')->name('orders')->middleware('auth');
Route::get('/orders/new', 'OrderController@create')->name('order.create')->middleware('auth');
Route::post('/orders', 'OrderController@store')->name('order.store')->middleware('auth');

Route::get('/dishes', 'DishController@index')->name('dishes')->middleware('auth');
Route::get('/dishes/new', 'DishController@create')->name('dish.create')->middleware('auth');
Route::post('/dishes', 'DishController@store')->name('dish.store')->middleware('auth');
Route::get('/dishes/{dish}/edit', 'DishController@edit')->name('dish.edit')->middleware('auth');
Route::put('/dishes', 'DishController@update')->middleware('auth');
Route::delete('/dishes/{dish}/delete', 'DishController@delete')->name('dish.delete')->middleware('auth');

Route::get('/ingredients', 'IngredientController@index')->name('ingredients')->middleware('auth');
Route::post('/ingredients', 'IngredientController@store')->name('ingredient.store')->middleware('auth');
Route::get('/ingredient/{ingredient}/edit', 'IngredientController@edit')->name('ingredient.edit')->middleware('auth');
Route::put('/ingredients/{ingredient}/update', 'IngredientController@update')->name('ingredient.update')->middleware('auth');
Route::delete('/ingredient/{ingredient}/delete', 'IngredientController@delete')->name('ingredient.delete')->middleware('auth');

Route::get('/organizations', 'OrganizationController@index')->name('organizations')->middleware('auth');
Route::get('/organizations/new', 'OrganizationController@create')->name('organization.create')->middleware('auth');
Route::post('/organizations', 'OrganizationController@store')->middleware('auth');

Route::get('/categories', 'CategoryController@index')->name('categories')->middleware('auth');
Route::get('/categories/new', 'CategoryController@create')->name('category.new')->middleware('auth');
Route::post('/categories', 'CategoryController@store')->middleware('auth');

Route::get('/report', 'ReportController@index')->name('report')->middleware('auth');

Route::get('/admin', 'AdminController@index')->name('admins')->middleware('auth');
Route::post('/admin', 'AdminController@storeCode')->name('admin.store')->middleware('auth');

Route::get('/clients', 'ClientController@index')->name('client.index')->middleware('auth');

