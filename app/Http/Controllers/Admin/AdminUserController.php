<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminUserController extends Controller
{
    /**
     * عرض قائمة المستخدمين
     */
    public function index()
    {
        $users = User::withTrashed()->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * عرض نموذج إنشاء مستخدم جديد
     */
    public function create()
    {
        return view('Admin.users.create');
    }

    /**
     * حفظ مستخدم جديد في قاعدة البيانات
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:user,admin'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'تم إنشاء المستخدم بنجاح!');
    }

    /**
     * عرض بيانات مستخدم معين
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * عرض نموذج تعديل مستخدم
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * تحديث بيانات المستخدم في قاعدة البيانات
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
           
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
          
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'تم تحديث المستخدم بنجاح!');
    }

    /**
     * حذف مستخدم من قاعدة البيانات (Soft Delete)
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'تم حذف المستخدم بنجاح!');
    }

    /**
     * استعادة مستخدم محذوف
     */
    public function restore($id)
    {
        User::withTrashed()->where('id', $id)->restore();
        return redirect()->route('admin.users.index')
            ->with('success', 'تم استعادة المستخدم بنجاح!');
    }

    /**
     * حذف نهائي لمستخدم
     */
    public function forceDelete($id)
    {
        User::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('admin.users.index')
            ->with('success', 'تم الحذف النهائي للمستخدم بنجاح!');
    }
}