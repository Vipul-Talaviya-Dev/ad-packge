<?php

namespace App\Http\Controllers\User;

use Session;
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

    public function addToCard(Request $request)
    {
        // Remove Cart Item
        if($request->get('removeCartId')) {
            $cartItems = Session::get('cart');
            foreach($cartItems as $k => $cart)
            {
                if($cart['cart_id'] == $request->get('removeCartId'))
                {   
                    unset($cartItems[$k]);
                }
            }
            Session::put('cart', array_values($cartItems));
            return response()->json([
                'status' => true,
                'totalItem' => ((Session::get('cart') =="") ? 0 : count(Session::get('cart')))
            ]);
        }

        $productId = $request->get('product_id');
        if($productId == "") {
            return response()->json([
                'status' => false,
                'error' => 'Required Field'
            ]);
        }

        $count = 0;
        if(Session::get('cart') != "") {
            $count = count(Session::get('cart')) + 1;
            $new_cart_id = "ADPACKING_".$count;
            foreach(Session::get('cart') as $cartItems) {
                if($cartItems['cart_product_id'] == $productId) {
                    return response()->json([
                        'status' => false,
                        'error' => 'Already Added For This Product..'
                    ]);
                }   
            }
            $items = array("cart_id" => $new_cart_id,"cart_product_id" => $productId);
            Session::push('cart', $items);
        } else {
            // if session doesn't exist - create one
            $items[] = array("cart_id" => "ADPACKING_1" ,"cart_product_id" => $productId);
            Session::put('cart', $items);
        }   

        // For Basket Counting // 
        return response()->json([
            'status' => true,
            'totalItem' => ((Session::get('cart') =="") ? 0 : count(Session::get('cart')))
        ]);
    }

    public function carts()
    {
        return view('user.carts');
    }

    public function cartOrderDetail(Request $request)
    {
        if($request->get('product_id') == "" || $request->get('product_qty') == "") {
            return response()->json([
                'status' => false,
                'error' => 'Required Field'
            ]);
        }

        $qty            = $request->get('product_qty');
        $total          = $request->get('total');
        $final_amount   = $request->get('finalamount');
        $product_id     = $request->get('product_id');
        $orders = array();
        for($i = 0; $i<count($product_id); $i++) {
            $orders['product'][] = array("product_id" => $product_id[$i],"qty" => $qty[$i]);
        }
        $orders['total'] = $total;
        $orders['final_amount'] = $final_amount;
        Session::put('CART_AMOUNT', $final_amount);
        Session::put('discount', 0);
        Session::put('order', $orders);

        // For Basket Counting // 
        return response()->json([
            'status' => true,
            'order' => ((Session::get('order') =="") ? 0 : count(Session::get('order')))
        ]);
    }

    public function orderShipping()
    {
        if(Session::get('order') == null) {
            return redirect(route('user.index'));
        }
        Session::put('redirect', route('user.orderShipping'));
        if (!\Auth::check()) {
            return redirect(route('user.loginForm'));
        }
        $user = Auth::user();
        $deliverCharge = AppContent::find(1);
        return view('user.order-shipping', [
            'addresses' => $user->addresses,
            'deliverCharge' => $deliverCharge->delivery_charge,
            'cart' => false,
            'footer' => false
        ]);
    }
}
