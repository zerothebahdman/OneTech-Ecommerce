<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Backend\AdminController;

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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::prefix('/admin/dashboard/')->group(function () {
// });
Route::get('/user/dashboard/logout', [AdminController::class, 'logout'])->name('user.logout');

// Admin Dashboard Route
Route::prefix('/admin/')->name('admin.')->group(function () {

    Route::middleware(['guest:admin'])->group(function () {
        Route::view('login', 'adminDashboard.auth.login')->name('login');
        Route::post('login', [SuperAdminController::class, 'store'])->name('login.store');
    });

    Route::middleware(['auth:admin'])->group(function () {
        // Dashboard view
        Route::view('dashboard', 'adminDashboard.dashboard')->name('dashboard');

        // Admin Profile setup route
        Route::get('profile', [SuperAdminController::class, 'profile'])->name('profile');
        Route::get('profile/settings', [SuperAdminController::class, 'displayProfile'])->name('profile.settings');
        Route::post('profile/settings/update', [SuperAdminController::class, 'updateProfile'])->name('profile.update');
        Route::post('password/update', [SuperAdminController::class, 'updatePassword'])->name('password.update');

        // Product Category route
        Route::get('product/category', [CategoryController::class, 'index'])->name('category.index');
        Route::post('product/category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('product/category/edit/{slug}', [CategoryController::class , 'edit'])->name('category.edit');
        Route::put('product/category/{slug}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('product/category/{slug}', [CategoryController::class , 'destroy'])->name('category.delete');

        // Product Brand route
        Route::get('product/brand', [BrandController::class, 'index'])->name('brand.index');
        Route::post('product/brand', [BrandController::class, 'store'])->name('brand.store');
        Route::get('product/brand/edit/{slug}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::put('product/brand/{slug}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('product/brand/{slug}', [BrandController::class, 'destroy'])->name('brand.delete');

        // Admin Logout route
        Route::get('logout', [SuperAdminController::class, 'logout'])->name('logout');
    });
});


require __DIR__.'/auth.php';