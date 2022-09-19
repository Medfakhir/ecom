<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\AdminController;

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

Auth::routes();

Route::get("/activate/{code}",[ActivationController::class, 'ActivationUserAccount'])->name('user.activate');
Route::get("/resend/{email}",[ActivationController::class, 'ResendActivationCode'])->name('user.resend');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('products', ProductController::class);
Route::get('products/category/{category}', [HomeController::class,'GetProductsByCategory'])->name('category.products');

//Cart Route
Route::get('/cart', [CartController::class, 'index'])->name("cart.index");
Route::post('/add/cart/{product}', [CartController::class, 'addProductToCart'])->name("add.cart");
Route::delete('/remove/{product}/cart', [CartController::class, 'RemoveProductFromCart'])->name("remove.cart");
Route::put('/update/{product}/cart', [CartController::class, 'UpdateProductOnCart'])->name("update.cart");

//payment Route
Route::get('/handle-payment', [PaypalPaymentController::class, 'handlePayment'])->name("make.payment");
Route::get('/success-payment', [PaypalPaymentController::class, 'paymentSuccess'])->name("success.payment");
Route::get('/cancel-payment', [PaypalPaymentController::class, 'paymentCancel'])->name("cancel.payment");

//Admie Route
Route::get('/admin', [AdminController::class, 'index'])->name("admin.index");
Route::get('/admin/login', [AdminController::class, 'showAdminLoginForm'])->name("admin.login");
Route::post('/admin/login', [AdminController::class, 'adminLogin'])->name("admine.login");
Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name("admin.logout");
