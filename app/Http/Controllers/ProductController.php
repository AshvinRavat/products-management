<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index', [
            'products' => Product::all()
        ]);
    } 
    
    public function create()
    {
        return view('product.create');
    } 
    
    public function store(ProductRequest $request)
    {
        $image = $request->file('image')->store('product/images/', 'public'); 

        $product = $request->all();

        $product['image'] = $image;

        Product::create($product);

        return to_route('product.index');
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
