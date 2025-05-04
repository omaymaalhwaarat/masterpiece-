<?php
namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    // عرض صفحة إنشاء الملف الشخصي
    public function create()
    {
        return view('user.profile.create');
    }

    // تخزين البيانات في قاعدة البيانات
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:10',
            'phone' => 'required|string|max:15',
            // 'email' => 'required|string|email|max:255|unique:users,email',
        ]);

        // تخزين البيانات في قاعدة البيانات
        $profile = new Profile();
        $profile->user_id = auth()->id(); // ربط البروفايل بالمستخدم الحالي
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->country = $request->country;
        $profile->address = $request->address;
        $profile->city = $request->city;
        $profile->state = $request->state;
        $profile->zip = $request->zip;
        $profile->phone = $request->phone;
        // $profile->email = $request->email;
        $profile->save();
        



        // إعادة التوجيه مع رسالة نجاح
        return redirect()->intended(route('user.checkout'))->with('success', 'Profile created successfully! Proceeding to checkout.');
    }
    // عرض البيانات لتعديلها
    public function edit()
    {
        $user = auth()->user();
        $orders = $user->orders()->with(['items.product.images'])->get();
    
        return view('user.profile.edit', [
            'profile' => $user->profile,
            'orders' => $orders
        ]);
    }
    
    public function profile()
    {
        $user = auth()->user();
    
        // جلب الطلبات مع المنتجات
        $orders = $user->orders()->with(['items.product.images'])->get();
    
        return view('user.profile.edit', [
            'profile' => $user->profile, // أو حسب اسم المتغير
            
        ]);
    }
    // تحديث البيانات الخاصة بالملف الشخصي
    public function update(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'country' => 'required|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string',
            'zip' => 'required|string|max:10',
            'phone' => 'required|string|max:15',
            // 'email' => 'required|email',
        ]);

        // جلب الملف الشخصي للمستخدم وتحديثه
        $profile = auth()->user()->profile;
        $profile->update($validatedData);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->intended(route('user.shop-sidebar'))->with('success', 'Profile updated successfully! Proceeding to shop');

    }

    


    // حذف الملف الشخصي
    public function destroy()
    {
        $profile = auth()->user()->profile;
        $profile->delete();

        return redirect()->route('/')->with('success', 'Profile deleted successfully!');
    }
}