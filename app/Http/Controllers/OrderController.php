<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        return redirect()->route('order.history')->with('success', 'Order placed successfully!');
    }

    public function payment()
    {
        return view('orders.payment');
    }

    public function processPayment(Request $request)
    {
        return redirect()->route('order.history')->with('success', 'Payment successful!');
    }

    public function orderHistory()
    {
        $user = auth()->user();

        $orders = Order::with(['products:id,image,title,description,price'])
            ->where('user_id', $user->id)
            ->get();

        $productIds = $orders->pluck('products.*.id')->flatten()->unique();

        $products = Product::whereIn('id', $productIds)->get();

        return view('orders.history', compact('orders', 'products'));
    }
}
