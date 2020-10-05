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
//use App\Category;
Route::get('/', function () {
  return view('welcome');
});
Route::get('/about', function () {
  /*DB::table('items')->insert([
    ['name'=>'Nova Deodorant','slug'=>'nova-deo','content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus',
    'price'=>'50ghc','published'=>1,'user_id'=>1,'category_id'=>1,'created_at'=>'2020-09-22 15:43:45','updated_at'=>'2020-09-22 15:43:45']
  ]);*/

    return view('pages/about');
});


Route::resource('items', 'ItemController');

Route::resource('categories','CategoryController');

Route::resource('/Admin/users','Admin\UsersController')->middleware('can:manage-users');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




