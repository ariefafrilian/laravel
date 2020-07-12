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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@authenticate');

Route::middleware('check')->group(function () {
	Route::get('customers/datatables', 'CustomerController@customersDataTables');
	Route::get('inventories/datatables', 'InventorieController@inventoriesDataTables');
	Route::get('gifts/datatables', 'GiftController@giftsDataTables');
	Route::get('users/datatables', 'UserController@usersDataTables');

	Route::post('logout', 'LoginController@logout');

	Route::get('home', 'HomeController@home');
	Route::get('transaction', 'HomeController@transaction');

	Route::get('invoice/{id}', 'InvoiceController@invoice');
	Route::delete('invoice/{id}', 'InvoiceController@deleteInvoice');

	Route::resource('customers', 'CustomerController');
	Route::delete('customers/photo/{id}', 'CustomerController@deletePhotoCustomer');

	Route::resource('gifts', 'GiftController');
	Route::delete('gifts/photo/{id}', 'GiftController@deletePhotoGift');

	Route::resource('inventories', 'InventorieController');
	Route::delete('inventories/photo/{id}', 'InventorieController@deletePhotoProduct');

	Route::post('buy/{id}', 'BuyController@buy');

	Route::resource('users', 'UserController');
	Route::delete('users/photo/{id}', 'UserController@deletePhotoUser');

	Route::get('about', 'AboutController@about');

	Route::view('answer', 'answer');
});
