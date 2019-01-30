<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::latest()->active()->get();

    	return view('user.products', [
    		'products' => $products
    	]);
    }

    public function detail($productSlug)
    {
    	if(!$product = Product::where('slug', $productSlug)->first()) {
    		return redirect()->back();
    	}

    	return view('user.product-detail', [
    		'product' => $product
    	]);
    }
}
