<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// صفحة الرئيسية (home)
Route::get('/', [HomeController::class, 'index'])->name('user.index');

// عرض المنتجات في صفحة الـ Shop مع التصفية والبحث
Route::get('shop', [ShopController::class, 'index'])->name('user.shop-sidebar');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('user.product.show');

// تسجيل الخروج
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // أو التوجيه إلى الصفحة المناسبة
})->name('logout');
// Route::middleware(['auth', 'role:admin'])->get('/admin-dashboard', function () {
//     return view('admin.dashboard');  // إرجاع صفحة الـ Admin Dashboard
// });
// صفحة لوحة تحكم الادمن مع التحقق من الصلاحيات

Route::middleware(['auth', 'admin']) // استخدم مصفوفة بدلاً من `middleware:`
    ->prefix('admin')
    ->name('admin.') // <-- أضف هذا السطر!
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', AdminUserController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('orders', AdminOrderController::class);
        Route::resource('products', AdminProductController::class);
        Route::resource('reviews', AdminReviewController::class);
      

    });
    Route::get('/test-mail', function() {
        try {
            Mail::raw('This is a test email', function($message) {
                $message->to('omaymaalhawarat@gmail.com')
                        ->subject('Test Email');
            });
            return 'Email sent successfully!';
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    });

Route::middleware('auth')->group(function () {

    // مسارات خاصة بالمستخدمين
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::put('/user/profile', [ProfileController::class, 'update'])->name('user.profile.update');

    Route::get('profile/create', [ProfileController::class, 'create'])->name('user.profile.create');
    Route::post('profile', [ProfileController::class, 'store'])->name('user.profile.store');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('user.profile.destroy');
    Route::post('/cart/add', [ShopController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [ShopController::class, 'viewCart'])->name('cart.view');
    Route::delete('/cart/remove/{product_id}', [ShopController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/update/{productId}', [ShopController::class, 'updateCart']);
    Route::get('/faqs', [HomeController::class, 'faqs'])->name('user.faqs');

    // صفحة الـ Checkout
    Route::get('/checkout', [ShopController::class, 'checkout'])->name('user.checkout'); // صفحة عرض الـ checkout
    Route::post('/checkout', [ShopController::class, 'placeOrder'])->name('user.checkout.placeOrder'); // عند تقديم الطلب
    Route::get('/checkout-redirect', [ShopController::class, 'checkoutRedirect'])->name('user.checkout.redirect');
    Route::post('product/{productId}/review', [ProductController::class, 'storeReview'])->name('review.store');
    Route::get('product/{productId}/review/delete', [ProductController::class, 'deleteReview'])->name('review.delete');
    // إضافة Route لتحديث المراجعة
    Route::put('product/{productId}/review/update', [ProductController::class, 'updateReview'])->name('review.update');
    Route::post('/contact/store', [ContactController::class, 'store'])->name('user.contact.store');
    Route::get('/wishlist', [ShopController::class, 'wishlist'])->name('user.wishlist');

});

require __DIR__.'/auth.php';