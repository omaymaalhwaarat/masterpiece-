<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalUsers = User::count();

        
        $totalRevenue = Order::where('status', 'completed')->sum('total');
        
        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalProducts',
            'totalUsers',
            'totalRevenue',
            'recentOrders'
        ));
    }
}