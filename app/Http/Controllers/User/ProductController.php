<?php

namespace App\Http\Controllers\User;

use Mail;
use Auth;
use Session;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
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

        return view('user.order-shipping', [
            'addresses' => $user->addresses,
        ]);
    }

    public function shippingDetail(Request $request)
    {
        if(Session::get('order') == null) {
            return redirect(route('user.index'));
        }
        $user = Auth::user();
        
        if($request->get('addressOption') == "") {
            return redirect()->back()->with(['error' => 'Select Your Address...']);
        }

        Session::put('addressId', $request->get('addressOption'));
        return redirect(route('user.payment'));
    }

    public function payment()
    {
        if(Session::get('order') == null) {
            return redirect(route('user.index'));
        }
        $user = Auth::user();
        $address = $user->addresses()->find(Session::get('addressId'));

        return view('user.payment', [
            'user' => $user,
            'address' => $address,
            'deliverCharge' => 0,
        ]);
    }

    public function orderPlace(Request $request)
    {
        if(Session::get('order') == null) {
            return redirect(route('user.index'));
        }

        $user = Auth::user();
        $order = new Order;
        $order->user_id = $user->id;
        $order->address_id = Session::get('addressId');
        $order->payment_mode = $request->get('payment_option') ? $request->get('payment_option') : 2;
        $order->cart_amount = (Session::get('order')['final_amount'] - Session::get('discount')) + 0;
        $order->total_amount = (Session::get('order')['final_amount'] - Session::get('discount')) + 0;
        $order->payment_status = ($request->get('payment_option') == 1) ? 2 : 1;
        $order->order_status = ($request->get('payment_option') == 1) ? 3 : 1;
        $order->save();
        
        $orderId = $order->id;
        foreach(Session::get('order')['product'] as $key => $data) {
            $product = Product::find($data['product_id']);
            $orderProduct = new OrderProduct;
            $orderProduct->order_id = $order->id;
            $orderProduct->user_id = $user->id;
            $orderProduct->address_id = Session::get('addressId');
            $orderProduct->product_id = $product->id;
            $orderProduct->price = $product->price;
            $orderProduct->qty = $data['qty'];
            $orderProduct->order_status = ($request->get('payment_option') == 1) ? 3 : 1;;
            $orderProduct->save();

            $product->qty = $product->qty - $data['qty'];
            $product->save();
        }

        Session::forget('cart');
        Session::forget('discount');
        Session::forget('CART_AMOUNT');
        Session::forget('order');
        Session::forget('voucher');
        Session::forget('offer');
        Session::forget('addressId');

        Session::put('orderId', $orderId);
        
        return redirect(route('user.thanks'));
    }

    public function thanks(Request $request)
    {
        if(Session::get('orderId') == null) {
            return redirect(route('user.index'));
        }

        $order = Order::with(['orderProducts'])->find(Session::get('orderId'));
        $user = Auth::user();
        $address = $user->addresses()->find($order->address_id);
        
        Mail::send('user.email.order-place', [
            'order' => $order,
            'user' => $user,
            'address' => $address
        ], function ($message) use ($user) {
            $message->from('vipulpatel1152@gmail.com', 'Developer Mail')
                ->subject('Order Placed')
                ->to($user->email, $user->name);
        });

        Session::forget('orderId');

        return view('user.thanks', [
            'order' => $order,
            'user' => $user,
            'address' => $address,
        ]);
    }
}
