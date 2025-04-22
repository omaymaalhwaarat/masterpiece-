<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        // تحقق من صحة بيانات تسجيل الدخول
        if (Auth::attempt($request->only('email', 'password'))) {
            // إذا كان المستخدم من نوع admin
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard'); // التوجيه إلى لوحة تحكم الادمن
            }

            return redirect()->route('user.index'); // التوجيه إلى الصفحة الرئيسية للمستخدم العادي
        }

        // إذا كانت بيانات الدخول غير صحيحة
        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}