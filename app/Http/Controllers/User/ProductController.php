<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function show($id)
{
    $product = Product::with('category', 'discount', 'images')->findOrFail($id);

    // جلب المنتجات المرتبطة بنفس الفئة
    $relatedProducts = Product::with('images') // إضافة 'images' هنا لتحميل الصور
    ->where('category_id', $product->category_id)
    ->where('id', '!=', $id) // استبعاد المنتج الحالي
    ->take(5)
    ->get();
    return view('user.single-product', compact('product', 'relatedProducts'));
}


    public function index(Request $request)
    {
        // عرض كل المنتجات (من الممكن إضافة فلترة هنا حسب الفئة أو البحث)
        $categories = Category::all();
        $products = Product::with('category', 'discount');

        // تصفية المنتجات حسب الفئة
        if ($request->has('category_id')) {
            $products = $products->where('category_id', $request->category_id);
        }

        // تصفية المنتجات حسب البحث
        if ($request->has('search')) {
            $products = $products->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $products->get();

        return view('user.shop-sidebar', compact('products', 'categories'));
    }
}