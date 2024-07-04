<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\HomeFeController;
use App\Http\Controllers\ProductFeController;
use App\Http\Controllers\ProductFilterController;

use App\Http\Controllers\LoginRegisterFeController;
use App\Http\Controllers\CartController;

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
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', function () {
        return view('pages.dashboard.index');
    });

    Route::get('/users', function () {
        return view('pages.users.index');
    });
    Route::get('/user/add', function () {
        return view('pages.users.form-add');
    });
    Route::get('/user/show', function () {
        return view('pages.users.form-edit');
    });


    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/add', [ProductController::class, 'formAdd']);
    Route::get('/product/show/{id}', [ProductController::class, 'formEdit']);
    Route::post('/product/store', [ProductController::class, 'storeProduct']);
    Route::get('/product/delete/{id}', [ProductController::class, 'deleteProduct']);
    Route::post('/product/edit', [ProductController::class, 'editProduct']);
    Route::get('/product/editImage/{id}/{nameFile}', [ProductController::class, 'editImage']);

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categorie/add', [CategoryController::class, 'formAddCategory']);
    Route::post('/categorie/store', [CategoryController::class, 'storeCategorie']);
    Route::get('/categorie/show/{id}', [CategoryController::class, 'formEditCategory']);
    Route::post('/categorie/edit', [CategoryController::class, 'editCategory']);
    Route::get('/categorie/delete/{id}', [CategoryController::class, 'deleteCategory']);

    Route::get('/product-filter', [ProductFilterController::class, 'index']);

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/proses-login', [LoginController::class, 'prosesLogin']);

    Route::get('/register', function () {
        return view('register');
    });
});


Route::get('/', [HomeFeController::class, 'index']);
Route::get('/product/{slug}', [HomeFeController::class, 'detailProduct']);
Route::get('products/best-seller', [ProductFeController::class, 'bestSellerProduct']);
Route::get('products/recomendation', [ProductFeController::class, 'recomendationProduct']);
Route::get('login-user', [LoginRegisterFeController::class, 'index']);


Route::get('register-user', [LoginRegisterFeController::class, 'register']);
Route::post('proses-register-user', [LoginRegisterFeController::class, 'registerStore']);
Route::post('proses-login-user-fe', [LoginRegisterFeController::class, 'loginUser']);
Route::get('logout-proses', [LoginRegisterFeController::class, 'logout']);

Route::get('addCart', [CartController::class, 'addCart']);
Route::get('addCartSession', [CartController::class, 'addCartSession']);

Route::get('getCart', [CartController::class, 'getCart']);
Route::get('dellCart/{id}', [CartController::class, 'dellCart']);


Route::get('/products', [ProductFeController::class, 'index'])->name('our-products');
Route::get('/search', [ProductFeController::class, 'search']);



