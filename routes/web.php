<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Coupon\CouponController;
use App\Http\Controllers\Admin\Product\ProductsController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AddToCartController;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', [FrontendController::class, 'index'])->name('welcome');
Route::get('/product/details/{product}', [FrontendController::class, 'show'])->name('product.details');

Route::prefix('/user/')->name('user.')->group(function () {
    Route::get('add/wishlist/{id}', [WishlistController::class, 'addWishList'])->name('add.wishlist');
    Route::get('add/cart/{id}', [AddToCartController::class, 'addToCart'])->name('add.cart');
    Route::get('check', [AddToCartController::class, 'check']);

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
        Route::put('password/update', [UserDashboardController::class, 'updatePassword'])->name('password.update');
        Route::put('profile/update', [UserDashboardController::class, 'updateProfile'])->name('profile.update');
        Route::get('dashboard/logout', [UserDashboardController::class, 'logout'])->name('logout');
    });
});

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

        /* --------------- Sub Category -----------------*/
        Route::get('product/sub-category', [CategoryController::class, 'subCategoryIndex'])->name('subCategory.index');
        Route::post('product/sub-category', [CategoryController::class, 'subCategoryStore'])->name('subCategory.store');
        Route::get('product/sub-category/edit/{slug}', [CategoryController::class, 'subCategoryEdit'])->name('subCategory.edit');
        Route::put('product/sub-category/{slug}', [CategoryController::class, 'subCategoryUpdate'])->name('subCategory.update');
        Route::get('/product/sub-category/{slug}', [CategoryController::class, 'subCategoryDelete'])->name('subCategory.delete');

        /*------------------ Product Brand route --------------------*/
        Route::get('product/brand', [BrandController::class, 'index'])->name('brand.index');
        Route::post('product/brand', [BrandController::class, 'store'])->name('brand.store');
        Route::get('product/brand/edit/{slug}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::put('product/brand/{slug}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('product/brand/{slug}', [BrandController::class, 'destroy'])->name('brand.delete');

        // Admin Logout route
        Route::get('logout', [SuperAdminController::class, 'logout'])->name('logout');

        /* --------------------- Coupon Route ---------------------- */
        Route::get('coupons', [CouponController::class, 'index'])->name('coupon.index');
        Route::post('coupons', [CouponController::class, 'store'])->name('coupon.store');
        Route::get('coupons/edit/{slug}', [CouponController::class, 'edit'])->name('coupon.edit');
        Route::put('coupons/{slug}', [CouponController::class, 'update'])->name('coupon.update');
        Route::get('coupons/{slug}', [CouponController::class, 'delete'])->name('coupon.delete');

        /* -------------------- Newsletter -------------- */
        Route::get('newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
        Route::post('newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

        /* --------------------- Products --------------------- */
        Route::get('products', [ProductsController::class, 'index'])->name('products.index');
        Route::post('products', [ProductsController::class, 'store'])->name('products.store');
        Route::get('products/edit/{slug}', [ProductsController::class, 'edit'])->name('products.edit');
        Route::put('products/{slug}', [ProductsController::class, 'update'])->name('products.update');
        Route::put('products/image/{slug}', [ProductsController::class, 'updateImage'])->name('products.update.image');
        Route::get('products/{slug}', [ProductsController::class, 'destroy'])->name('products.delete');
        Route::get('products/inactive/{slug}', [ProductsController::class, 'inactiveStatus'])->name('products.inactive');
        Route::get('products/active/{slug}', [ProductsController::class, 'activeStatus'])->name('products.active');
        Route::get('products/details/{slug}', [ProductsController::class, 'productDetails'])->name('products.details');
        // show all  sub categories with ajax
        Route::get('products/subcategory/{category_id}', [ProductsController::class, 'getSubCat']);
    });
});


require __DIR__.'/auth.php';
