<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
//Route::get('/', function () {
  //  return view('welcome');
//});



Route::get('admin','AdminController@admin');

Route::get('cat/addcat','CategoryController@addcat');
Route::post('cat/save','CategoryController@save');
Route::get('category/view','CategoryController@view');
Route::get('category/showcat/{id}','CategoryController@show');
Route::get('category/editcat/{id}','CategoryController@edit');
Route::post('category/update','CategoryController@update');
Route::get('category/delete/{id}','CategoryController@delete');

Route::get('product/addproduct','ProductController@create');
Route::post('product/save','ProductController@save');
Route::get('product/view','ProductController@view');
Route::get('product/show/{id}','ProductController@show');
Route::get('product/edit/{id}','ProductController@edit');
Route::get('product/delete/{id}','ProductController@delete');
Route::post('product/update','ProductController@update');


Route::get('coupon/addcou','CouponController@create');
Route::post('coupon/save','CouponController@save');
Route::get('coupon/view','CouponController@view');
Route::get('coupon/show/{id}','CouponController@show');
Route::get('coupon/edit/{id}','CouponController@edit');
Route::get('coupon/delete/{id}','couponController@delete');
Route::post('coupon/update','couponController@update');

Route::get('banner/addban','BannerController@addban');
Route::post('banner/save','BannerController@save');
Route::get('banner/view','BannerController@view');
Route::get('banner/show/{id}','BannerController@show');
Route::get('banner/edit/{id}','BannerController@edit');
Route::get('banner/delete/{id}','BannerController@delete');
Route::post('banner/update','BannerController@update');
Route::get('displayorder','AdminController@order');
Route::get('vieworder/{id}','AdminController@vieworder');
Route::get('orderinvoice/{id}','AdminController@orderinvoice');



Route::get('front/productdetail/{id}','FrontController@productdetail');

#Add to cart
Route::post('addtocart','FrontController@addtocart');
Route::get('cart','FrontController@cart');
Route::get('cart/updatequantity/{id}/{product_quantity}','FrontController@updatequantity');

Route::get('user/login','UserController@login');
Route::get('user/register','UserController@register');
Route::post('register/save','UserController@regsave');
Route::post('login/save','UserController@loginsave');
Route::get('logout','UserController@logout');
Route::post('reset_password_without_token', 'AdminController@validatePasswordRequest');

Route::post('reset_password_with_token', 'AdminController@resetPassword');
Route::get('/verify','UserController@verifyUser')->name('verify.user');
//google login
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');
//facebook login
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');



Route::get('contact','FrontController@contact');
Route::get('checkout','FrontController@checkout');
Route::post('placeorder','FrontController@placeorder');
Route::get('thanks','FrontController@orderconfirm');
Route::get('myaccount','FrontController@myaccount');
Route::post('change-password', 'FrontController@changepassword')->name('change.password');

Route::get('viewdetail/{id}','FrontController@viewdetail');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard','AdminController@dashboard');
Route::get('/','FrontController@create');




Route::get('/clear', function() { 
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear'); 
        return "Cleared!"; 
    });