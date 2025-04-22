<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * عرض جميع الفئات.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // استرجاع جميع الفئات مع التعداد مع التصفية (pagination)
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * عرض نموذج إنشاء فئة جديدة.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * تخزين الفئة الجديدة في قاعدة البيانات.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name|max:255',
        ]);

        // إنشاء الفئة وحفظها في قاعدة البيانات
        Category::create($validatedData);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * عرض نموذج تعديل فئة.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * تحديث الفئة في قاعدة البيانات.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        // التحقق من البيانات المدخلة
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
        ]);

        // تحديث الفئة في قاعدة البيانات
        $category->update($validatedData);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * عرض الفئة بناءً على الـ ID.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * حذف الفئة من قاعدة البيانات.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        // حذف الفئة
        $category->delete();

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}