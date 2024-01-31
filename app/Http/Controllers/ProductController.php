<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $products->transform(function ($product) {
            $product->lastUpdated = $this->formatLastUpdated($product->lastUpdated);
            return $product;
        });

        return view('products.index', compact('products'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'image' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $product->update($request->only(['image', 'title', 'description', 'price']) + [
            'lastUpdated' => $this->formatLastUpdated(now()->toDateTimeString())
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    

    public function saveProduct(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/images');

        $publicImagePath = str_replace('public', 'storage', $imagePath);

        $product = new Product([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $publicImagePath,
            'lastUpdated' => $this->formatLastUpdated(now()->toDateTimeString()),
        ]);

        $product->save();

        return response()->json(['message' => 'Product saved successfully']);
    }

    private function formatLastUpdated($timestamp)
    {
        if (Str::startsWith($timestamp, 'Last updated')) {
            return $timestamp;
        }

        $carbonTimestamp = Carbon::parse($timestamp);
        $diff = $carbonTimestamp->diffForHumans();

        return 'Last updated ' . $diff;
    }
}
