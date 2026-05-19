<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FillerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\accountController;

// |--------------------------------------------------------------------------
// | Dashboard
// |--------------------------------------------------------------------------

Route::get('/dashboard', [DashboardController::class, 'viewDashboard'])->name('dashboard');


// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------

Route::get('products',[ProductController::class,'products'])->name('Stuffs');
Route::get('/', [ProductController::class, 'home'])->name('home')->middleware('merchant.guest');
Route::get('/product/{id}', [ProductController::class, 'productDetails'])->name('product.details');
Route::get('/search', [ProductController::class, 'search'])->name('search');

// |--------------------------------------------------------------------------
// | auth routes
// |--------------------------------------------------------------------------

Route::get('login', [AuthController::class, 'showloginform'])->name('show.login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('signup', [AuthController::class, 'showSignUpForm'])->name('show.signup');
Route::post('signup', [AuthController::class, 'signUp'])->name('signup');

// |--------------------------------------------------------------------------
// | password reset routes
// |--------------------------------------------------------------------------

Route::get('password/forgot', [AuthController::class, 'showForgotPasswordForm'])->name('password.Forgot');
Route::post('password/email', [AuthController::class, 'resetmailsender'])->name('password.reset.email');
Route::get('password/reset/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset.form');
Route::post('password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');


// |--------------------------------------------------------------------------
// | Google Auth routes
// |--------------------------------------------------------------------------

Route::get('auth/google', [GoogleController::class, 'redirect'])->name('auth.google');
Route::get('auth/google-callback', [GoogleController::class, 'callback'])->name('login.google.callback');
// |--------------------------------------------------------------------------
// | cart routes > middleware auth
// |--------------------------------------------------------------------------

Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('loggedout');
    Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('updateQuantity');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
    Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::delete('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
    Route::post('/cart/buy-now', [CartController::class, 'buyNow'])->name('cart.buy.now');
    Route::get('/My-account', [AuthController::class, 'showAccount'])->name('account');
    });
    
// |--------------------------------------------------------------------------
// | My Account routes
// |--------------------------------------------------------------------------  

Route::put('/profilePicUpdate'      , [accountController::class, 'profilePicUpdate'])->name('profile.pic.update');
Route::get('/modify/My-profile'     , [accountController::class, 'profileModifyShow'])->name('profile.modify.show');
Route::put('/profile/modify'        , [accountController::class, 'updateProfile'])->name('profile.update');
route::delete('/profile/delete'    , [accountController::class, 'deleteAccount'])->name('account.delete');

// |--------------------------------------------------------------------------
// | merchant auth routes
// |--------------------------------------------------------------------------
    
Route::get('/merchant/login'    , [MerchantController::class, 'showMerchantLoginForm'])->name('show.merchant.login')->middleware('merchant.guest');
Route::post('/merchant/login'   , [MerchantController::class, 'merchantLogin'])->name('merchant.login')->middleware('merchant.guest');
Route::get('/merchant/signup'   , [MerchantController::class, 'showMerchantSignUpForm'])->name('show.merchant.signup')->middleware('merchant.guest');
Route::post('/merchant/signup'  , [MerchantController::class, 'merchantSignUp'])->name('merchant.signup')->middleware('merchant.guest');
Route::middleware('auth.merchant')->group(function () {
    Route::put('/merchant/pic_upt'  , [MerchantController::class, 'merchantProfilePicUpdate'])->name('merchant.profilepic.update');
    Route::get('/merchant/modify'   , [MerchantController::class, 'merchantProfileUpdateShow'])->name('merchant.modify');
    Route::put('/merchant/update'   , [MerchantController::class, 'merchantProfileUpdate'])->name('merchant.profile.update');
    Route::post('/merchant/logout'  , [MerchantController::class, 'merchantLogout'])->name('merchant.logout');
    Route::delete('/merchant/delete', [MerchantController::class, 'merchantAccountDelete'])->name('merchant.account.delete');
    Route::get('/merchant/dashboard', [MerchantController::class, 'viewMerchantDashboard'])->name('merchant.dashboard');
    Route::get('/merchant/product/create',[FillerController::class,'showAddProduct'])->name('show.add.product');
    Route::post('/merchant/product/create',[FillerController::class,'addProduct'])->name('add.product');
    Route::delete('/merchant/product/remove/{product}',[FillerController::class, 'removeProduct'])->name('remove.My-product');
});
