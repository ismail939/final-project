<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    $products=Product::get();
    return view('welcome', compact('products'));
});
Route::post('/admin/home', function (Request $request) {
    if($request->name=="ismail"&&$request->password=="gg.gg.gg"){
        return view('admin.home');
    }
    else{
        echo "<script>alert('Wrong credentials')</script>";
        return view('/admin.login');
    }
})->name('admin.home');

// // route to login page
Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::get('/userHome/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/login', [UserController::class, 'showL'])->name('loginL');
Route::get('/register', function () {
    return view('user.register');
})->name('register');

Route::get('/userHome/{id}', [UserController::class, 'show'])->name('userHome.show');
Route::get('/userHome/order{id}', [UserController::class, 'showWithOrder'])->name('userHome.order');
Route::post('/register/store', [UserController::class, 'store'])->name('register.store');
Route::get('/userProfile/{id}', [UserController::class, 'showP'])->name('profile');

Route::get('/admin', function () {
    return view('admin.login');
});

Route::get('/admin/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/admin/home/users', [AdminController::class, 'indexUsers'])->name('admin.users');
Route::resource('/product', ProductController::class);
Route::get('/product/update/{id}', [ProductController::class, 'updatee'])->name('product.updat');
Route::put('/product/{id}/edit', [ProductController::class, 'edit']);
Route::get('/admin/orders', [OrderController::class, 'index'])->name('order.index');

Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/addToCart/{id}', [ProductController::class, 'addToCart'])->name('product.addToCart');


Route::get('/shoppingCart', [ProductController::class, 'getCart'])->name('product.shoppingCart');

Route::get('/checkout', [ProductController::class, 'getCheckout'])->name('checkout');
Route::post('/checkoutFinish/{id}', [UserController::class, 'checkoutFinish'])->name('checkoutFinish');
Route::get('/addCredit', [UserController::class, 'addCredit'])->name('addCredit');
Route::post('/addCreditFinish/{id}', [UserController::class, 'addCreditFinish'])->name('addCreditFinish');
