<?php


namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // جلب الفئات
        $categories = Category::all();

        // الحصول على آخر 5 منتجات مضافة (New Arrivals)
        $newArrivals = Product::latest()->take(5)->get();

        // الحصول على أفضل المنتجات مبيعاً (Best Sellers) - افترضنا أن الأفضل مبيعاً هم الأعلى مبيعاً
        $bestSellers = Product::with('category', 'discount')
                            ->orderBy('sales_count', 'desc') // نفترض وجود عمود sales_count لعدد المبيعات
                            ->take(5)
                            ->get();

                              // جلب المنتج ذو الخصم الأعلى
        $highestDiscountProduct = Product::with('discount')
        ->orderByDesc('discount_id')  // نفترض أننا نقوم بالترتيب حسب discount_id أو إذا كان لديك عمود آخر يمثل نسبة الخصم، استخدمه
        ->first();

// عرض الصفحة الرئيسية مع المنتجات
return view('user.index', compact('categories', 'newArrivals', 'bestSellers', 'highestDiscountProduct'));
       
    }
}