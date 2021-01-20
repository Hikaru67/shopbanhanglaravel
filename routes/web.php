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
//Frontend
Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');
Route::post('/tim-kiem', 'HomeController@search');

//Danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{slug_category_product}', 'CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}', 'BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}', 'ProductController@details_product');

//Backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');

//Category Product
Route::get('/add-category-product', 'CategoryProduct@add_category_product');
Route::get('/all-category-product', 'CategoryProduct@all_category_product');
Route::get('/edit-category-product/{category_product_id}', 'CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'CategoryProduct@delete_category_product');

Route::get('/unactive-category-product/{category_product_id}', 'CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}', 'CategoryProduct@active_category_product');

Route::post('/save-category-product', 'CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}', 'CategoryProduct@update_category_product');

//Brand Product
Route::get('/add-brand-product', 'BrandProduct@add_brand_product');
Route::get('/all-brand-product', 'BrandProduct@all_brand_product');
Route::get('/edit-brand-product/{brand_product_id}', 'BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}', 'BrandProduct@delete_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}', 'BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}', 'BrandProduct@active_brand_product');

Route::post('/save-brand-product', 'BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}', 'BrandProduct@update_brand_product');

//Product
Route::get('/add-product', 'ProductController@add_product');
Route::get('/all-product', 'ProductController@all_product');
Route::get('/edit-product/{brand_product_id}', 'ProductController@edit_product');
Route::get('/delete-product/{brand_product_id}', 'ProductController@delete_product');

Route::get('/unactive-product/{brand_product_id}', 'ProductController@unactive_product');
Route::get('/active-product/{brand_product_id}', 'ProductController@active_product');

Route::post('/save-product', 'ProductController@save_product');
Route::post('/update-product/{brand_product_id}', 'ProductController@update_product');


//Cart
Route::post('/add-to-cart', 'CartController@save_cart');
Route::post('/add-cart-ajax', 'CartController@add_cart_ajax');

Route::get('/show-cart', 'CartController@show_cart');
Route::get('/gio-hang', 'CartController@show_cart_ajax');
Route::get('/update-cart-quantity', 'CartController@update_cart_quantity');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');

//Checkout
Route::get('/login-checkout', 'CheckoutController@login_checkout');
Route::get('/logout-customer', 'CheckoutController@logout_customer');
Route::get('/checkout', 'CheckoutController@checkout');
Route::get('/payment', 'CheckoutController@payment');

Route::post('/add-customer', 'CheckoutController@add_customer');
Route::post('/login-customer', 'CheckoutController@login_customer');
Route::post('/save-checkout-customer', 'CheckoutController@save_checkout_customer');
Route::post('/order-place', 'CheckoutController@order_place');

//Order
Route::get('/manage-order', 'CheckoutController@manage_order');
Route::get('/view-order/{orderId}', 'CheckoutController@view_order');

//Send mail
Route::get('/send-mail', 'HomeController@send_mail');\

//Login facebook
Route::get('/login-facebook', 'AdminController@login_facebook');
Route::get('/admin/callback', 'AdminController@callback_facebook');

//Login google
Route::get('/login-google', 'AdminController@login_google');
Route::get('/google/callback', 'AdminController@callback_google');

//Customer
Route::get('/login', 'CustomerController@login');
Route::post('/login2', 'CustomerController@login2');
Route::get('/messenger/{conversation_id}', 'CustomerController@messenger');
Route::get('/messenger2/{conversation_id}', 'CustomerController@messenger2');
Route::get('/messenger2', function (){
    return redirect('/messenger2/0');
});
Route::get('/messenger', function (){
    return redirect('/messenger/0');
});
Route::post('/add-message', 'CustomerController@add_message');
