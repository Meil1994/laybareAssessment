<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagerController;
use App\Http\Controllers\CategoryManagerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* User Manager*/
Route::get('/user/manager', [UserManagerController::class, 'userManager']);
Route::delete('users/{id}', [UserManagerController::class, 'deleteUser'])->name('users.delete');
Route::get('/user/{user}', [UserManagerController::class, 'editUser'])->name('user.show');
Route::put('/user/{user}', [UserManagerController::class, 'updateUser'])->name('user.update');
Route::post('/users', [UserManagerController::class, 'storeUser'])->name('users.store');
Route::get('/new/user', [UserManagerController::class, 'addUser']);


/* Category Manager*/
Route::get('/category/manager', [CategoryManagerController::class, 'categoryManager']);
Route::delete('category/{id}', [CategoryManagerController::class, 'deleteCategory'])->name('category.delete');
Route::get('/category/{category}', [CategoryManagerController::class, 'editCategory'])->name('category.show');
Route::put('/category/{category}', [CategoryManagerController::class, 'updateCategory'])->name('category.update');
Route::get('/new/category', [CategoryManagerController::class, 'addCategory']);
Route::post('/category', [CategoryManagerController::class, 'storeCategory'])->name('api.category.store');

/* Category Manager*/
Route::get('/product/manager', [ProductController::class, 'productManager']);
Route::delete('product/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');
Route::get('/product/{product}', [ProductController::class, 'editProduct'])->name('product.show');
Route::get('/new/product', [ProductController::class, 'addProduct']);
Route::post('/product', [ProductController::class, 'storeProduct'])->name('api.product.store');
Route::put('/product/{product}', [ProductController::class, 'updateProduct'])->name('product.update');

/* Dashboard*/
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/single/product/{product}', [DashboardController::class, 'singleProduct'])->name('single.show');