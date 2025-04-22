<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin'); // التأكد أن المستخدم هو admin
    }

    /**
     * عرض جميع الطلبات
     */
    public function index()
    {
        $orders = Order::with('user')->paginate(10); // جلب الطلبات مع المستخدمين
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * عرض تفاصيل الطلب
     */
    public function show(Order $order)
    {
        $orderItems = $order->items; // الحصول على عناصر الطلب
        return view('admin.orders.show', compact('order', 'orderItems'));
    }

    /**
     * عرض نموذج تعديل الطلب
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * تحديث حالة الطلب
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        // تحديث حالة الطلب
        $order->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully!');
    }

    /**
     * حذف الطلب
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully!');
    }
}