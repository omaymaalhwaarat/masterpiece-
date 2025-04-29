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
    
        // جلب المنتجات المرتبطة بنفس الفئة
        $relatedProducts = Product::with('images')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->take(5)
            ->get();
    
        return view('user.single-product', compact('product', 'relatedProducts'));
    }
    




    public function index(Request $request)
    {
        // Fetch categories
        $categories = Category::all();
        $products = Product::with('category', 'discount');
        
        // Filter by category
        if ($request->has('category_id')) {
            $products = $products->where('category_id', $request->category_id);
        }
        
        $query = Product::query();

    // فلترة بالكلمة المفتاحية (بحث في الاسم)
    if ($request->has('search') && $request->search != '') {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // // فلترة حسب التصنيف
    // if ($request->has('category_id') && $request->category_id != '') {
    //     $query->where('category_id', $request->category_id);
    // }

        // Price range filtering
         // إذا كان هناك فلتر للـ price_range
      // إذا كان هناك فلتر للـ price_range
      if ($request->has('price_range')) {
        $priceRange = $request->input('price_range');
    
        if ($priceRange == '10.00') {
            // If the price is less than $10
            $products->where('price', '<', 10.00); 
        } elseif ($priceRange == '20.00-40.00') {
            // If the price is between $20 and $40
            $products->whereBetween('price', [20.00, 40.00]); 
        } elseif ($priceRange == '40.00-50.00') {
            // If the price is between $40 and $50
            $products->whereBetween('price', [40.00, 50.00]);
        } elseif ($priceRange == '50.00-60.00') {
            // If the price is between $50 and $60
            $products->whereBetween('price', [50.00, 60.00]);
        } elseif ($priceRange == '60.00') {
            // If the price is greater than $60
            $products->where('price', '>', 60.00);
        }
    }
    

        
        
        // Filter by Best Seller
        if ($request->has('best_seller')) {
            $products = $products->where('is_best_seller', true); 
        }
    
        $products = $products->get();
    
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