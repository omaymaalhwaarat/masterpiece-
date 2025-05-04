<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function show($id)
    {
        // جلب المنتج مع الفئة والمراجعات والصور المتعلقة به
        $product = Product::with('category', 'discount', 'images', 'reviews.user')->findOrFail($id);
        
        // جلب المنتجات المرتبطة بنفس الفئة مع التصفية (تحديد 5 منتجات فقط)
       // استخدام paginate بدلاً من get لجلب المنتجات مع التصفح
$relatedProducts = Product::with('images')
->where('category_id', $product->category_id)
->where('id', '!=', $id)
->paginate(5); // التصفح مع 5 منتجات في الصفحة الواحدة

        
        return view('user.single-product', compact('product', 'relatedProducts'));
    }
    public function index(Request $request)
{
    // جلب الفئات
    $categories = Category::all();

    // جلب المنتجات مع العلاقات
    $products = Product::with('category', 'discount');

    // تصفية المنتجات بناءً على الفئة المختارة
    if ($request->has('category_id') && $request->category_id) {
        $products = $products->where('category_id', $request->category_id);
    }

    // تصفية المنتجات بناءً على البحث
    if ($request->has('search') && $request->search != '') {
        $products = $products->where('name', 'like', '%' . $request->search . '%');
    }

    // تصفية المنتجات بناءً على السعر
    if ($request->has('price_range') && $request->price_range) {
        $priceRange = $request->price_range;
        
        if (strpos($priceRange, '-') !== false) {
            list($minPrice, $maxPrice) = explode('-', $priceRange);
            $products = $products->whereBetween('price', [$minPrice, $maxPrice]);
        } elseif ($priceRange == '10.00') {
            $products = $products->where('price', '<', 10);
        } elseif ($priceRange == '60.00') {
            $products = $products->where('price', '>', 60);
        }
    }

    // فلتر ترتيب المنتجات
    if ($request->has('filter') && $request->filter) {
        if ($request->filter == 'price_asc') {
            $products = $products->orderBy('price', 'asc');
        } elseif ($request->filter == 'price_desc') {
            $products = $products->orderBy('price', 'desc');
        } elseif ($request->filter == 'best_sellers') {
            $products = $products->withCount('orderItems as sold_count')
                ->orderByDesc('sold_count');
        } elseif ($request->filter == 'newest') {
            $products = $products->orderByDesc('created_at');
        }
    }

    // جلب المنتجات مع الترقيم
    $products = $products->paginate(12);

    return view('user.shop-sidebar', compact('products', 'categories'));
}
    public function storeReview(Request $request, $productId)
    {
        $user = auth()->user();
        
        // تحقق إذا كان المستخدم قد طلب هذا المنتج
        $hasPurchased = OrderItem::where('product_id', $productId)
            ->whereHas('order', function($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->where('status', 'completed');
            })->exists();
    
        if (!$hasPurchased) {
            return redirect()->back()->with('error', 'You must purchase the product to leave a review.');
        }
    
        $product = Product::findOrFail($productId);
        
        // التحقق إذا كان للمستخدم مراجعة سابقة لهذا المنتج
        $existingReview = $product->reviews()->where('user_id', $user->id)->first();
    
        if ($existingReview) {
            // إذا كانت هناك مراجعة سابقة، نقوم بتحديثها
            $existingReview->update([
                'comment' => $request->comment,
                'rating' => $request->rating,
            ]);
            return redirect()->route('user.product.show', $productId)->with('success', 'Your review has been updated.');
        } else {
            // إذا لم يكن هناك مراجعة سابقة، نقوم بإضافتها
            $product->reviews()->create([
                'user_id' => $user->id,
                'comment' => $request->comment,
                'rating' => $request->rating,
            ]);
            return redirect()->route('user.product.show', $productId)->with('success', 'Your review has been added.');
        }
    }
    

    
    public function deleteReview($productId)
    {
        $user = auth()->user();
        $product = Product::findOrFail($productId);
    
        // التحقق إذا كان للمستخدم مراجعة لهذا المنتج
        $review = $product->reviews()->where('user_id', $user->id)->first();
    
        if ($review) {
            // حذف المراجعة
            $review->delete();
            return redirect()->route('user.product.show', $productId)->with('success', 'Your review has been deleted.');
        }
    
        return redirect()->route('user.product.show', $productId)->with('error', 'You have no review to delete.');
    }
    


    


public function showProductDetails($productId)
{
    // جلب تفاصيل المنتج مع المراجعات
    $product = Product::with('reviews.user')->findOrFail($productId);

    return view('product.details', compact('product'));
}


public function updateReview(Request $request, $productId)
{
    $user = auth()->user();
    
    // التحقق إذا كانت المراجعة موجودة للمستخدم
    $review = Review::where('product_id', $productId)->where('user_id', $user->id)->first();
    
    if (!$review) {
        return redirect()->back()->with('error', 'Review not found.');
    }

    // التحديث
    $review->update([
        'comment' => $request->comment,
        'rating' => $request->rating,
    ]);
    
    return redirect()->route('user.product.show', $productId)->with('success', 'Your review has been updated.');
}




}