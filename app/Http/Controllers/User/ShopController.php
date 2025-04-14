<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        // جلب الفئات
        $categories = Category::all();

        // جلب المنتجات بناءً على الفلاتر
        $products = Product::with('category', 'discount');

        // تصفية المنتجات بناءً على الفئة المختارة
        if ($request->has('category_id')) {
            $products = $products->where('category_id', $request->category_id);
        }

        // البحث في المنتجات
        if ($request->has('search')) {
            $products = $products->where('name', 'like', '%' . $request->search . '%');
        }
         // تصفية المنتجات بناءً على الفلتر المختار
    if ($request->has('filter') && $request->filter) {
        if ($request->filter == 'price') {
            // ترتيب المنتجات حسب السعر
            $products = $products->orderBy('price', 'asc'); // يمكنك تغيير الترتيب حسب الحاجة (تصاعدي أو تنازلي)
        } elseif ($request->filter == 'best_sellers') {
            // ترتيب المنتجات حسب الأكثر مبيعًا (افتراضًا أنك تريد ترتيب المنتجات بناءً على عدد المبيعات أو خاصية معينة)
            $products = $products->orderBy('sales_count', 'desc'); // مثال على ترتيب حسب المبيعات
        }
    }

        $products = $products->get();

        return view('user.shop-sidebar', compact('products', 'categories'));
    }
    public function addToCart(Request $request)
{
    $product = Product::findOrFail($request->product_id);
    $quantity = $request->input('quantity', 1);

    // إضافة للسلة - نستخدم session
    $cart = session()->get('cart', []);

    // إذا كان المنتج موجود في السلة، زود الكمية
    if (isset($cart[$product->id])) {
        $cart[$product->id]['quantity'] += $quantity;
    } else {
        // إذا كان المنتج غير موجود، أضفه إلى السلة
        $cart[$product->id] = [
            'product_id' => $product->id,  // تأكد من أن الـ product_id موجود هنا
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'image' => $product->image ?? null
        ];
    }

    // وضع السلة في session
    session()->put('cart', $cart);

    // إعادة التوجيه لصفحة السلة
    return redirect()->route('cart.view');
}

public function viewCart()
{
    // استرجاع السلة من الـ session
    $cart = session()->get('cart', []);

    // جلب جميع المنتجات الموجودة في السلة بناءً على الـ product_id
    $productIds = array_keys($cart); // استخراج جميع معرّفات المنتجات في السلة
    $products = Product::whereIn('id', $productIds)->get(); // جلب المنتجات من قاعدة البيانات

    // إعادة عرض السلة مع المنتجات
    return view('user.cart', compact('cart', 'products'));
}
public function removeFromCart($product_id)
{
    // استرجاع السلة من الـ session
    $cart = session()->get('cart', []);

    // تحقق إذا كان المنتج موجود في السلة
    if(isset($cart[$product_id])) {
        // حذف المنتج من السلة
        unset($cart[$product_id]);

        // تحديث السلة في الـ session
        session()->put('cart', $cart);
        
    }

    // إعادة التوجيه لصفحة السلة
    return redirect()->route('cart.view');
}


}