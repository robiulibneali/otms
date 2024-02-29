<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index', [
            'orders'    => Order::latest()->get(),
        ]);
    }

    public function changeStatusPage($orderId)
    {
        return view('admin.orders.edit', [
            'order'    => Order::find($orderId),
        ]);
    }

    public function updateOrderStatus(Request $request, $orderId)
    {
        Order::find($orderId)->update(['status' => $request->status]);
        return redirect()->route('admin.orders.index')->with('success', 'Status Changed Successfully');
    }
}
