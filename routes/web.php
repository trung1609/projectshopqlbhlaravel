<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//frontend
Route::get('/', [HomeController::class,'index']);
Route::get('/trang-chu','App\Http\Controllers\HomeController@index');
Route::post('/tim-kiem','App\Http\Controllers\HomeController@search');

//danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{category_id}','App\Http\Controllers\CategoryProduct@show_category_home');

//thuong-hieu-san-pham
Route::get('/thuong-hieu-san-pham/{brand_id}','App\Http\Controllers\BrandProduct@show_brand_home');

//chi-tiet-san-pham
Route::get('/chi-tiet-san-pham/{product_id}','App\Http\Controllers\ProductController@details_product');

//backend
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);
Route::get('/logout',[AdminController::class,'logout']);
Route::post('/admin-dashboard',[AdminController::class,'dashboard']);

//category product
Route::get('/add-category-product',[CategoryProduct::class,'add_category_product']);
Route::get('/all-category-product',[CategoryProduct::class,'all_category_product']);

Route::get('/unactive-category-product/{category_product_id}',[CategoryProduct::class,'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}',[CategoryProduct::class,'active_category_product']);

Route::post('/save-category-product',[CategoryProduct::class,'save_category_product']);
Route::get('/edit-category-product/{category_product_id}',[CategoryProduct::class,'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}',[CategoryProduct::class,'delete_category_product']);
Route::post('/update-category-product/{category_product_id}',[CategoryProduct::class,'update_category_product']);

//brand product
Route::get('/add-brand-product',[BrandProduct::class,'add_brand_product']);
Route::get('/all-brand-product',[BrandProduct::class,'all_brand_product']);

Route::get('/unactive-brand-product/{brand_product_id}',[BrandProduct::class,'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}',[BrandProduct::class,'active_brand_product']);

Route::post('/save-brand-product',[BrandProduct::class,'save_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}',[BrandProduct::class,'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}',[BrandProduct::class,'delete_brand_product']);
Route::post('/update-brand-product/{brand_product_id}',[BrandProduct::class,'update_brand_product']);

//product
Route::get('/add-product',[ProductController::class,'add_product']);
Route::get('/all-product',[ProductController::class,'all_product']);

Route::get('/unactive-product/{product_id}',[ProductController::class,'unactive_product']);
Route::get('/active-product/{product_id}',[ProductController::class,'active_product']);

Route::post('/save-product',[ProductController::class,'save_product']);
Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product']);
Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product']);
Route::post('/update-product/{product_id}',[ProductController::class,'update_product']);

//cart
Route::post('/save-cart',[CartController::class,'save_cart']);
Route::post('/update-cart-quantity',[CartController::class,'update_cart_quantity']);
Route::get('/show-cart',[CartController::class,'show_cart']);
Route::get('/delete-to-cart/{rowId}',[CartController::class,'delete_to_cart']);

//check-out
Route::get('/login-checkout',[CheckoutController::class,'login_checkout']);
Route::get('/logout-checkout',[CheckoutController::class,'logout_checkout']);
Route::get('/checkout',[CheckoutController::class,'checkout']);
Route::get('/payment',[CheckoutController::class,'payment']);
Route::post('/order-place',[CheckoutController::class,'order_place']);
Route::post('/login-customer',[CheckoutController::class,'login_customer']);
Route::post('/add-customer',[CheckoutController::class,'add_customer']);
Route::post('/save-checkout-customer',[CheckoutController::class,'save_checkout_customer']);

//order
Route::get('/manage-order',[CheckoutController::class,'manage_order']);
Route::get('/view-order/{orderId}',[CheckoutController::class,'view_order']);

//send mail
Route::get('/send-mail',[HomeController::class,'send_mail']);

//socialite
Route::get('/login-facebook',[AdminController::class,'login_facebook']);
Route::get('/admin/callback',[AdminController::class,'callback_facebook']);
Route::get('/login-google',[AdminController::class,'login_google']);
Route::get('/google/callback',[AdminController::class,'callback_google']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
