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
use App\Items;

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'welcome'
]);
Route::get('pages/About', function () {

    return view('pages/About');
});
Route::get('pages/add-to-cart/{id}' ,[
  'uses' => 'ProductController@getAddToCart',
  'as' => 'product.addToCart'
]);
Route::get('/reduce/{id}' ,[
  'uses' => 'ProductController@getReduceByOne',
  'as' => 'product.reduceByOne'
]);

Route::get('/remove/{id}' ,[
  'uses' => 'ProductController@getRemoveArticle',
  'as' => 'product.remove'
]);
Route::get('pages/shopping-cart' ,[
  'uses' => 'ProductController@getCart',
  'as' => 'product.shoppingCart'
]);
Route::get('pages/my-orders' ,[
  'uses' => 'ProductController@getProfile',
  'as' => 'product.Orders'
]);

Route::get('pages/checkout' ,[
  'uses' => 'ProductController@getCheckout',
  'as' => 'checkout',
  'middleware' =>'auth'
]);
Route::post('pages/checkout' ,[
  'uses' => 'ProductController@postCheckout',
  'as' => 'checkout'
]);

Route::resource('menus', 'MenuItemController');

Route::resource('items', 'ProductController');

Route::resource('categories','CategoryController');

Route::resource('/Admin/users','Admin\UsersController')->middleware('can:manage-users');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




