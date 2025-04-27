<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
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
    
    
// ************************************************************
//             ADD TO CART 
    

    public function addToCart(Request $request)
{
    $product = Product::findOrFail($request->product_id);
    $quantity = $request->input('quantity', 1);

   // استخدام localStorage لتخزين السلة
   $cart = json_decode($request->cookie('cart', '[]'), true); // قراءة السلة من الكوكيز إذا كانت موجودة


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
// *******************************************************************
//                  VIEW   CART

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

    

// هذه الدالة تستخدم لإزالة منتج من السلة
// يتم استرجاع السلة من الـ session، ثم حذف المنتج المحدد
// وأخيرًا، يتم تحديث السلة في الـ session
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


// هذه الدالة تستخدم لتحديث كمية المنتج في السلة
// يتم استرجاع السلة من الجلسة، ثم تحديث الكمية للمنتج المحدد
// وأخيرًا، يتم حساب السعر الإجمالي وإرجاعه كـ JSON
// يتم استخدام الـ productId لتحديد المنتج الذي سيتم تحديثه
// يتم استخدام الـ request لتحديد الكمية الجديدة
// يتم استخدام الـ session لتخزين السلة
public function updateCart(Request $request, $productId)
{
    $cart = session()->get('cart', []);

    // إذا كان المنتج موجود في السلة، تحديث الكمية
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] = $request->quantity;
    }

    // تخزين السلة في الجلسة
    session()->put('cart', $cart);

    // حساب إجمالي السعر بعد التحديث
    $cartCollection = collect($cart);
    $cartTotal = number_format($cartCollection->sum(function ($item) {
        $product = Product::find($item['product_id']);
        return $item['quantity'] * $product->price;
    }), 2);

    // حساب السعر الفرعي للمنتج
    $product = Product::find($productId);
    $totalPrice = number_format($product->price * $cart[$productId]['quantity'], 2);

    // إرسال البيانات المحدثة كـ JSON
    return response()->json([
        'totalPrice' => $totalPrice,
        'cartTotal' => $cartTotal
    ]);
}

// هذه الدالة تستخدم لحساب عدد العناصر في السلة
// يتم استرجاع السلة من الجلسة، ثم حساب عدد العناصر فيها
// وأخيرًا، يتم إرجاع العدد
public function getCartCount()
{
    // الحصول على السلة من الجلسة
    $cart = session()->get('cart', []);

    // حساب عدد العناصر في السلة
    $cartCount = count($cart);

    return $cartCount;
}

//************* */ CHECKOUT **************  
// هذه الدالة تستخدم لعرض صفحة الـ checkout
// بعد التأكد من أن المستخدم مسجل الدخول ولديه بروفايل
// إذا لم يكن لديه بروفايل، يتم توجيهه لإنشاء بروفايل جديد

public function checkout(Request $request)
{
    // التأكد من أن المستخدم مسجل الدخول
    if (auth()->check()) {
        $user = auth()->user();
        $profile = $user->profile;

        // استرجاع السلة من الجلسة
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }

        // حساب السعر الإجمالي
        $cartCollection = collect($cart);
        $cartTotal = $cartCollection->sum(function ($item) {
            $product = Product::find($item['product_id']);
            return $item['quantity'] * $product->price;
        });

        // إذا كان الملف الشخصي موجودًا، يمكننا استخدامه مباشرة
        if ($profile) {
            // إرسال بيانات الـ Profile والـ Cart Total للـ View
            return view('user.checkout', compact('cart', 'cartTotal', 'profile'));
        } else {
            return redirect()->route('user.profile.create')->with('error', 'Please complete your profile to proceed with the checkout.');
        }
    } else {
        return redirect()->route('login')->with('error', 'You need to be logged in to proceed with the checkout.');
    }
}



//************* */  CHECKOUT REDIRECT **************
// هذه الدالة تستخدم لإعادة توجيه المستخدم إلى صفحة الـ checkout
// بعد التأكد من أنه مسجل الدخول ولديه بروفايل
// إذا لم يكن لديه بروفايل، يتم توجيهه لإنشاء بروفايل جديد
// إذا كان المستخدم غير مسجل الدخول، يتم توجيهه إلى صفحة تسجيل الدخول
public function checkoutRedirect(Request $request)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'You need to be logged in.');
    }

    $user = auth()->user();

    // إذا ما عنده بروفايل
    if (!$user->profile) {
        // نحفظ الـ intended URL حتى يرجع له بعد ما يخلص
        session()->put('url.intended', route('user.checkout'));

        return redirect()->route('user.profile.create')->with('info', 'Please complete your profile to continue to checkout.');
    }

    // إذا عنده بروفايل، نوديه مباشرة للـ checkout
    return redirect()->route('user.checkout');
}


//************* */  CHECKOUT REDIRECT TO PROFILE EDIT **************
// هذه الدالة تستخدم لإعادة توجيه المستخدم إلى صفحة تعديل الملف الشخصي
public function redirectToProfileEdit()
{
    // استرجاع بيانات الـ cart من الجلسة
    $cart = session()->get('cart', []);
    $cartTotal = 0;

    // حساب المجموع الكلي للـ cart
    foreach ($cart as $item) {
        $cartTotal += $item['price'] * $item['quantity'];
    }

    // تخزين الـ cart و الـ cartTotal في الجلسة
    session(['cart' => $cart]);
    session(['cartTotal' => $cartTotal]);

    // إعادة التوجيه إلى صفحة تعديل الملف الشخصي
    return redirect()->route('user.profile.edit');
}



//************* */  UPDATE PROFILE **************
// هذه الدالة تستخدم لتحديث بيانات الملف الشخصي للمستخدم
public function updateProfile(Request $request)
{
    // حفظ التعديلات
    $user = auth()->user();
    $user->update($request->all());

    // استرجاع الـ cart من الجلسة بعد حفظ التعديلات
    $cartTotal = session('cartTotal');
    $cartItems = session('cart');

    // إعادة التوجيه إلى صفحة Checkout مع استرجاع الـ cart
    return redirect()->route('user.checkout')->with(['cartTotal' => $cartTotal, 'cartItems' => $cartItems]);
}


//************* */ رفع الطلب على database **************

public function placeOrder(Request $request)
{
    // استرجاع السلة من الجلسة
    $cart = session()->get('cart', []);

    // التأكد من أن السلة غير فارغة
    if (empty($cart)) {
        return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
    }

    // حساب المجموع الكلي للطلب
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // إنشاء طلب جديد في جدول 'orders'
    $order = Order::create([
        'user_id' => auth()->id(), // المستخدم الحالي
        'total' => $total,
        'status' => 'pending', // حالة الطلب (قيد الانتظار)
    ]);

    // إضافة العناصر إلى جدول 'order_items'
    foreach ($cart as $item) {
        $order->items()->create([  // استخدام العلاقة لإضافة العناصر
            'product_id' => $item['product_id'], // معرّف المنتج
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
    }

    // تفريغ السلة بعد إتمام الطلب
    session()->forget('cart');

    // إعادة التوجيه إلى صفحة المتجر مع رسالة نجاح
    return redirect()->route('user.shop-sidebar')->with('success', 'Your order has been placed successfully!');
}


public function wishlist()
{
    // إذا كان المستخدم مسجل الدخول
    $user_id = auth()->id();

    // افتراضياً الـ wishlist فارغة إذا لم تكن موجودة
    $wishlist = json_decode(request()->cookie('wishlist_'.$user_id), true) ?? [];

    return view('user.wishlist', compact('wishlist', 'user_id'));
}





}