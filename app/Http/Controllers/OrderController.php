<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['orderItems', 'orderItems.product'])
        ->where('user_id', Auth::user()->id)
        ->get();

        return view('order.index', [
            'orders' => $orders
        ]);
    } 
    
    public function create()
    {
        $products = Product::pluck('name', 'id');
        return view('order.create', ['products' => $products]);
    } 
    
    public function store(Request $request)
    {
        $request->validate([
            'product_ids' => 'required'
        ]);


        $productsPrice = Product::whereIn('id', $request->product_ids)
            ->select(DB::raw('price * 10 as total'), 'price', 'id as product_id')
            ->get()
            ->toArray();

        $orderItems = [];

        $total = 0;
        foreach ($productsPrice as $productPrice)
        {
            $orderItems[]  = [
                ...$productPrice,
                'quantity' => 10,
            ]; 

            $total  = $total + $productPrice['total']; 
        }
        
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'total' => $total 
        ]);

        $order->orderItems()->createMany($orderItems);

        return to_route('order.index');
    }  

    
    public function edit(Product $product)
    {
        return view('product.edit', ['product' => $product]);
    }  

    public function update(ProductRequest $request, Product $product)
    {
        $productData = $request->all();
        
        $productData['image'] = $productData['old_image'];
        unset($productData['old_image']);
        
        if (isset($request->image))
        {
            $productData['image'] = $request->file('image')->store('product/images', 'public');
            Storage::disk('public')->delete($request->old_image);
        }  

        $product->update($productData);

        return to_route('product.index');
    }  

    public function delete(Product $product)
    {
        Storage::disk('public')->delete($product->image);
        $product->delete();

        return to_route('product.index');
    } 
}
