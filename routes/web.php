<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Admin\SuperAdminController;
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
Route::get('/admin/dashboard/logout', [AdminController::class, 'logout'])->name('user.logout');

// Admin Dashboard Route
Route::prefix('/admin/')->name('admin.')->group(function () {

    Route::middleware(['guest:admin'])->group(function () {
        Route::view('login', 'adminDashboard.auth.login')->name('login');
        Route::post('login', [SuperAdminController::class, 'store'])->name('login.store');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::view('dashboard', 'adminDashboard.dashboard')->name('dashboard');
        Route::get('profile', [SuperAdminController::class, 'profile'])->name('profile');
        Route::get('profile/settings', [SuperAdminController::class, 'displayProfile'])->name('profile.settings');
        Route::post('profile/settings/update', [SuperAdminController::class, 'updateProfile'])->name('profile.update');
        Route::post('password/update', [SuperAdminController::class, 'updatePassword'])->name('password.update');
        Route::get('logout', [SuperAdminController::class, 'logout'])->name('logout');
    });
});


require __DIR__.'/auth.php';