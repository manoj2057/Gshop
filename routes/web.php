<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\HomeController;


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

Route::get('/', [HomeController::class, 'index']);
Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
    ->name('dashboard');
Route::get('/Admin/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products_list');
Route::get('/Admin/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create_product');
Route::post('/Admin/products/store', [App\Http\Controllers\Admin\ProductController::class, 'store']);
Route::get('/admin/products/edit/{product}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
Route::Post('/admin/products/update/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
Route::get('/admin/products/destroy/{product}', [App\Http\Controllers\Admin\ProductController::class, 'destroy']);
