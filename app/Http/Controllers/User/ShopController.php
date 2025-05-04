<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CartItem;

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

    // جلب الصورة المرتبطة بالمنتج (أول صورة من جدول product_images)
    $productImage = $product->images()->first();

    // تحقق إذا كان المنتج موجود في السلة للمستخدم الحالي
    $cartItem = CartItem::where('user_id', auth()->id())
        ->where('product_id', $product->id)
        ->first();

    // الحصول على الخصم
    $discount = $product->discount; // أو يمكنك تخصيص الطريقة لاستخراج الخصم الخاص بالمنتج

    // إذا كان المنتج موجودًا في السلة، قم بتحديث الكمية
    if ($cartItem) {
        $cartItem->quantity += $quantity;
        // إذا كان هناك خصم، قم بتخزينه أيضًا
        $cartItem->discount = $discount ? $discount->amount : 0;
        $cartItem->save();
    } else {
        // إذا لم يكن المنتج موجودًا في السلة، أضفه
        CartItem::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->price,
            'image' => $productImage ? $productImage->image_path : null, // إضافة الصورة إلى السلة
            'discount' => $discount ? $discount->amount : 0, // إضافة الخصم إلى السلة
        ]);
    }

    return redirect()->route('cart.view');
}



    // *******************************************************************
//                  VIEW   CART

public function viewCart()
{
    $cartItems = CartItem::where('user_id', auth()->id())->get();
    $products = Product::whereIn('id', $cartItems->pluck('product_id'))->get();

    // حساب المجموع الكلي بعد الخصم
    $cartTotal = $cartItems->sum(function ($item) {
        $product = Product::find($item->product_id);
        $discountedPrice = $product->price - $item->discount; // السعر بعد الخصم
        return $item->quantity * $discountedPrice; // المجموع مع الخصم
    });

    return view('user.cart', compact('cartItems', 'products', 'cartTotal'));
}





    // هذه الدالة تستخدم لإزالة منتج من السلة
// يتم استرجاع السلة من الـ session، ثم حذف المنتج المحدد
// وأخيرًا، يتم تحديث السلة في الـ session
    public function removeFromCart($product_id)
    {
        $cartItem = CartItem::where('user_id', auth()->id())
            ->where('product_id', $product_id)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
        }

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
        // البحث عن العنصر في السلة للمستخدم الحالي
        $cartItem = CartItem::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            // تحديث الكمية في السلة
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        // حساب المجموع الكلي بعد التحديث
        $cartItems = CartItem::where('user_id', auth()->id())->get();
        $cartTotal = $cartItems->sum(function ($item) {
            $product = Product::find($item->product_id);
            return $item->quantity * $product->price;
        });

        // حساب السعر الفرعي للمنتج المحدد
        $product = Product::find($productId);
        $totalPrice = number_format($product->price * $cartItem->quantity, 2);

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

            // استرجاع السلة من قاعدة البيانات بدلاً من الجلسة
            $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();


            // التأكد من أن السلة ليست فارغة
            if ($cartItems->isEmpty()) {
                return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
            }

            // حساب السعر الإجمالي
            $cartTotal = $cartItems->sum(function ($item) {
                $product = $item->product;
                $discountedPrice = $product->price - $product->discount;
                return $item->quantity * $discountedPrice;
            });

            // إذا كان الملف الشخصي موجودًا، يمكننا استخدامه مباشرة
            if ($profile) {
                // إرسال بيانات الـ Profile والـ Cart Total للـ View
                return view('user.checkout', compact('cartItems', 'cartTotal', 'profile'));
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
        // استرجاع بيانات الـ cart من قاعدة البيانات بدلاً من الـ session
        $cartItems = CartItem::where('user_id', auth()->id())->get();
        $cartTotal = $cartItems->sum(function ($item) {
            $product = Product::find($item->product_id);
            return $item->quantity * $product->price;
        });

        // إرسال الـ cart و الـ cartTotal إلى صفحة تعديل الملف الشخصي
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
        // استرجاع السلة من قاعدة البيانات
        $cartItems = CartItem::where('user_id', auth()->id())->get();
            // حساب المجموع الكلي بعد الخصم
    $cartTotal = $cartItems->sum(function ($item) {
        $product = Product::find($item->product_id);
        $discountedPrice = $product->price - $item->discount; // السعر بعد الخصم
        return $item->quantity * $discountedPrice; // المجموع مع الخصم
    });
        // التأكد من أن السلة غير فارغة
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }

        // حساب المجموع الكلي للطلب
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->quantity * $item->price;
        }

        // إنشاء طلب جديد في جدول 'orders'
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'status' => 'pending',
        ]);

        // إضافة العناصر إلى جدول 'order_items'
        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
            
        // تحديث كمية المنتج في جدول 'products' بعد إتمام عملية الشراء
        $product = Product::find($item->product_id);
        $product->stock -= $item->quantity; // تقليل الكمية
        $product->save(); // حفظ التغيير في قاعدة البيانات
        }

        // إضافة المنتجات المشتراة إلى الـ Order من الـ Wishlist (حذفها بعدها من الـ Wishlist)
        $wishlist = auth()->user()->wishlist;

        foreach ($wishlist as $product) {
            // إضافة المنتج إلى الطلب
            $order->items()->create([
                'product_id' => $product->id,
                'quantity' => 1, // أو يمكنك تحديد الكمية إذا كانت مختلفة
                'price' => $product->price,
            ]);
            // حذف المنتج من الـ Wishlist
            auth()->user()->wishlist()->detach($product->id);
        }

        // تفريغ السلة بعد إتمام الطلب
        CartItem::where('user_id', auth()->id())->delete();

        return redirect()->route('user.shop-sidebar')->with('success', 'Your order has been placed successfully!');
    }



    public function wishlist()
    {
        // إذا كان المستخدم مسجل الدخول
        $user = auth()->user();

        // جلب المنتجات من الـ wishlist المرتبطة بالمستخدم
        $wishlist = $user->wishlist;



        // عرض صفحة الـ wishlist مع البيانات
        return view('user.wishlist', compact('wishlist'));
    }




    public function addToWishlist($productId)
    {
        // التأكد من أن المستخدم مسجل الدخول
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to add products to your wishlist.');
        }

        $user = auth()->user();
        $product = Product::findOrFail($productId);

        // تحقق إذا كان المنتج موجودًا بالفعل في الـ wishlist
        if ($user->wishlist()->where('product_id', $productId)->exists()) {
            return redirect()->back()->with('error', 'This product is already in your wishlist.');
        }
        $wishlistCount = $user->wishlist->count();
        $user->wishlist()->attach($productId);


        // Return the updated count as a JSON response

        // إضافة المنتج إلى الـ wishlist

        return response()->json(['wishlistCount' => $wishlistCount]);
    }


    public function addToCartFromWishlist($productId)
    {
        // جلب المنتج من الـ Wishlist
        $product = Product::findOrFail($productId);

        // إضافة المنتج إلى السلة
        CartItem::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => 1,  // يمكنك تحديد الكمية حسب الحاجة
            'price' => $product->price,
        ]);

        // إزالة المنتج من الـ Wishlist
        auth()->user()->wishlist()->detach($productId);

        return redirect()->route('cart.view')->with('success', 'Product added to cart.');
    }

    public function removeFromWishlist($productId)
    {
        // إزالة المنتج من الـ Wishlist
        auth()->user()->wishlist()->detach($productId);

        return redirect()->route('user.wishlist')->with('success', 'Product removed from wishlist.');
    }

    public function showNavbar()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $wishlistCount = $user->wishlist()->count();
            dd($wishlistCount); // سيتم طباعة القيمة في المتصفح
            return view('user.navbar', compact('wishlistCount'));
        } else {
            return view('user.navbar', ['wishlistCount' => 0]);
        }
    }


}