<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController;

use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\ProfileController;
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
// صفحة الرئيسية (home)
Route::get('/', [HomeController::class, 'index'])->name('user.index');

// عرض المنتجات في صفحة الـ Shop مع التصفية والبحث
Route::get('shop', [ShopController::class, 'index'])->name('user.shop-sidebar');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('user.product.show');
Route::post('/cart/add', [ShopController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [ShopController::class, 'viewCart'])->name('cart.view');
Route::delete('/cart/remove/{product_id}', [ShopController::class, 'removeFromCart'])->name('cart.remove');



Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // أو التوجيه إلى الصفحة المناسبة
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';