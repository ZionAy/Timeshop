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

# CMS
Route::middleware(['adminguard'])->group(function() {
	Route::prefix('admin')->group(function() {
		Route::get('dashboard', 'AdminController@dashboard');
		Route::resource('pages', 'PagesController');
		Route::resource('contents', 'ContentsController');
		Route::resource('categories', 'CategoriesController');
		Route::resource('products', 'ProductsController');
		Route::get('orders', 'AdminController@orders');
	});
});


# Shop pages
Route::prefix('shop')->group(function(){
	Route::get('/', 'ShopController@shop');
	Route::get('add-to-cart', 'ShopController@addToCart');
	Route::get('cart', 'ShopController@cart');
	Route::get('update-cart', 'ShopController@updateCart');
	Route::get('remove-from-cart', 'ShopController@removeFromCart');
	Route::get('clear-cart', 'ShopController@clearCart');
	Route::get('checkout', 'ShopController@checkout');
	Route::get('order', 'ShopController@order');
	Route::get('search', 'ShopController@search');
	Route::get('{curl}', 'ShopController@category');
	Route::get('{curl}/{purl}', 'ShopController@product');
});

# User pages
Route::prefix('account')->group(function() {
	Route::get('login', 'ClientController@login');
	Route::post('login', 'ClientController@signin');
	Route::post('register', 'ClientController@signup');
	Route::get('logout', 'ClientController@logout');
	Route::get('profile', 'ClientController@profile');
	Route::post('changeAvatar', 'ClientController@changeAvatar');
});

# General pages
Route::get('/', 'PagesController@home');
Route::get('{url}', 'PagesController@page');



