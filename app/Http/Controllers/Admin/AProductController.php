<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;

class AProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // تأكد من أن المستخدم مسجل دخوله
        $this->middleware('role:admin'); // تأكد من أن المستخدم هو Admin
    }

    // عرض جميع المنتجات
    public function index()
    {
        $products = Product::with('category', 'discount')->get();
        return view('admin.products.index', compact('products'));
    }

    // عرض نموذج إضافة منتج جديد
    public function create()
    {
        $categories = Category::all();
        $discounts = Discount::all();
        return view('admin.products.create', compact('categories', 'discounts'));
    }

    // تخزين منتج جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'discount_id' => 'nullable|exists:discounts,id',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->discount_id = $request->discount_id;
        $product->stock = $request->stock;

        // التعامل مع الصور
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
    }

    // عرض نموذج تعديل منتج
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $discounts = Discount::all();
        return view('admin.products.edit', compact('product', 'categories', 'discounts'));
    }

    // تحديث منتج
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'discount_id' => 'nullable|exists:discounts,id',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->discount_id = $request->discount_id;
        $product->stock = $request->stock;

        // التعامل مع الصور
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    // حذف منتج
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}