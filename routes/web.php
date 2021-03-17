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

// Admin Route
Route::prefix('/admin/')->name('admin.')->group(function () {

    Route::middleware(['guest:admin'])->group(function () {
        Route::view('login', 'admin.auth.login');
        Route::post('login', [SuperAdminController::class, 'store'])->name('login');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::view('dashboard', 'admin.dashboard')->name('dashboard');
        Route::get('profile/settings', [SuperAdminController::class, 'displayProfile'])->name('profile.settings');
        Route::post('profile/settings/update', [SuperAdminController::class, 'updateProfile'])->name('profile.update');
        Route::get('logout', [SuperAdminController::class, 'logout'])->name('logout');
    });
});


require __DIR__.'/auth.php';
