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