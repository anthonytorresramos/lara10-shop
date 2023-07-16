<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\RegisteredUsersController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    ## Route to view all registered users
    Route::get('registered_users_tabs', [RegisteredUsersController::class, 'index'])->name('user_tabs');

    ## Create View Route for create users
    Route::view('registered_users_tabs/create', 'dashboard.tabs.registeredUsers.create')->name('user_tabs.create');

    ## Post Route to validate and store new users
    Route::post('registered_users_tabs/store', [RegisteredUsersController::class, 'store'])->name('user_tabs.store');

    ## Edit Route for create users
    Route::get('registered_users_tabs/edit/{userId}', [RegisteredUsersController::class, 'edit'])->name('user_tabs.edit');

    ## Update Route for create users
    Route::put('registered_users_tabs/edit/{userId}', [RegisteredUsersController::class, 'update'])->name('user_tabs.update');

    ## Soft Delete user
    Route::delete('registered_users_tabs/delete/{userId}', [RegisteredUsersController::class, 'delete'])->name('user_tabs.delete');

    ## Show Archive of all soft deleted users
    Route::get('registered_users_tabs/archive', [RegisteredUsersController::class, 'archive'])->name('user_tabs.archive');

    ## Restore Soft Deleted users
    Route::get('registered_users_tabs/restore/{userId}', [RegisteredUsersController::class, 'restore'])->name('user_tabs.restore');







});

## route group with prefix and can only be access when authenticated.
Route::prefix('ajax')->middleware('auth')->group(function () {
    Route::post('user_tabs/page', [RegisteredUserController::class, 'userTabs_page'])->name('user_tabs.page');
});

require __DIR__.'/auth.php';
