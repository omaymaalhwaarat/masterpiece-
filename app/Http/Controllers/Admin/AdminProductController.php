<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin'); // التأكد أن المستخدم هو admin
    }

    /**
     * عرض جميع المنتجات
     */
    public function index()
    {
        $products = Product::with('category')->paginate(25);
        return view('admin.products.index', compact('products'));
    }

    /**
     * عرض نموذج إضافة منتج جديد
     */
    public function create()
    {
        $categories = Category::all();
        $discounts = Discount::all();
        
        return view('admin.products.create', compact('categories', 'discounts'));
    }

    /**
     * تخزين منتج جديد
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'discount_id' => 'nullable|exists:discounts,id',
            'how_to_use' => 'nullable|string',  
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // حفظ المنتج
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'discount_id' => $request->discount_id,
            'how_to_use' => $request->how_to_use,
        ]);
    
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Get the original name of the image
                $originalName = $image->getClientOriginalName();
        
                // Generate a unique name to avoid overwriting existing files
                $imageName = time() . '_' . $originalName;
        
                // Save the image in public/images/products with the unique name
                $imagePath = $image->move(public_path('images/products'), $imageName);
        
                // Add the image to the product_images table
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => 'images/products/' . $imageName,  // Save the relative path
                ]);
            }
        }
        
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }
    

    /**
     * عرض تفاصيل المنتج
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * عرض نموذج تعديل المنتج
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $discounts = Discount::all();
        return view('admin.products.edit', compact('product', 'categories', 'discounts'));
    }

    /**
     * تحديث المنتج
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'discount_id' => 'nullable|exists:discounts,id', // إضافة التحقق من الخصم
            'how_to_use' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        
        // تحديث المنتج
        $product->forceFill([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'discount_id' => $request->discount_id, 
            'how_to_use' => $request->how_to_use,
        ])->save(); // حفظ التحديثات
        
        // إذا كان هناك صورة جديدة
        if ($request->hasFile('images')) {
            // العثور على الصورة الحالية في جدول product_images
            $currentImage = $product->images->first(); // هنا نفترض أنه يوجد صورة واحدة لكل منتج
        
            // إذا كانت هناك صورة موجودة في قاعدة البيانات، نقوم بحذفها
            if ($currentImage) {
                // حذف الصورة القديمة من المجلد باستخدام المسار الموجود في image_path
                $oldImagePath = public_path($currentImage->image_path);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // حذف الصورة القديمة
                }
        
                // حذف الصورة القديمة من قاعدة البيانات
                $currentImage->delete();
            }
    
            // تخزين الصورة الجديدة
            foreach ($request->file('images') as $image) {
                // الحصول على اسم الصورة الأصلي
                $originalName = $image->getClientOriginalName();
        
                // توليد اسم فريد للصورة لتجنب الكتابة فوق الملفات القديمة
                $imageName = time() . '_' . $originalName;
        
                // نقل الصورة إلى المجلد النهائي
                $image->move(public_path('images/products'), $imageName);
        
                // إضافة الصورة الجديدة إلى جدول product_images
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => 'images/products/' . $imageName, // تخزين المسار النسبي
                ]);
            }
        }
    
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }
    
    
    
    
    /**
     * حذف المنتج
     */
    public function destroy(Product $product)
    {
        // التحقق إذا كان المنتج يحتوي على صور
        $currentImage = $product->images->first(); // نفترض أن هناك صورة واحدة فقط
    
        // إذا كانت هناك صورة مرتبطة بالمنتج
        if ($currentImage) {
            
            // الحصول على المسار الكامل للصورة
            $imagePath = public_path($currentImage->image_path);
           
            // التحقق إذا كانت الصورة موجودة في المجلد
            if (file_exists($imagePath)) {
                unlink($imagePath); // حذف الصورة من المجلد
            }
    
            // حذف السجل الخاص بالصورة من جدول product_images
            $currentImage->forceDelete(); // استخدام forceDelete لضمان الحذف الفعلي من قاعدة البيانات
        }
    
        // حذف المنتج نفسه من قاعدة البيانات
        $product->forceDelete();
        
        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.products.index')->with('success', 'Product and its associated image deleted successfully!');
    }
    
    
}