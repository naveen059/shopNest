<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        $products = Product::all();

        return view('dashboard', compact('products'));
    }



public function placeOrder(Request $request, Product $product)
{
    $user = Auth::user();

    $order = Order::create([
        'user_id' => $user->id,
        'product_id' => $product->id,
        'quantity' => $request->input('quantity')
    ]);

    $productDetails = Product::where('id', $product->id)
        ->whereHas('orders', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->first();

    $orderProduct = new OrderProduct([
        'order_id' => $order->id,
        'product_id' => $product->id,
        'quantity' => $request->input('quantity'),
    ]);

    $orderProduct->save();

    $order->load('user', 'products');

    return redirect()->route('order.history')->with([
        'success' => 'Order placed successfully!',
        'orders' => $order,
        'products' => $productDetails,
    ]);
}


}
