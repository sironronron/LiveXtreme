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

Route::get('/', 'HomeController@index')->name('welcome');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//Facebook Login
Route::get('facebook', function () {
	return view('facebook');
});

Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Search
Route::get('/search', 'SearchController@search')->name('search');

// Store Controller
Route::get('/store/list/all', 'StoreController@index')->name('store.index');
Route::get('/store/product/{id}/{slug}', 'StoreController@show')->name('store.show');

// Collections
Route::get('/collection/cat/{id}/{slug}', 'CollectionController@subcategory')->name('cat.show');
Route::get('/collection/cat/{id}/{slug}/{subSlug}', 'CollectionController@subclassification')->name('subclass.show');

// Change locale
Route::get('locale/{locale}', function($locale) {
	Session::put('locale', $locale);
	return redirect()->back();
});

// User Profile
Route::resource('/member/profile','UserController');

// Cart Controller
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('addToCart', ['as' => 'add-to-cart', 'uses' => 'CartController@store']);
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');

Route::get('empty', function() {
	Cart::destroy();
});