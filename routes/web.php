<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

## route group with prefix and can only be access when authenticated.
Route::prefix('product')->middleware('auth')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('create', [ProductController::class, 'create'])->name('product.create');
    Route::post('store', [ProductController::class, 'store'])->name('product.store');
    Route::get('edit/{productId}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('update/{productId}', [ProductController::class, 'update'])->name('product.update');
    Route::get('archive', [ProductController::class, 'archive'])->name('product.archive');
    Route::get('restore/{productId}', [ProductController::class, 'restore'])->name('product.restore');
    Route::delete('delete/{productId}', [ProductController::class, 'delete'])->name('product.delete');
});
