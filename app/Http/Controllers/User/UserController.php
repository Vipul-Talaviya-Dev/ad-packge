<?php

namespace App\Http\Controllers\User;

use Auth;
use Session;
use Validator;
use App\Models\User;
use App\Models\Address;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	$orders = OrderProduct::latest()->with(['product', 'order'])->where('user_id', $user->id)->get();
    	return view('user.my-order', [
    		'orders' => $orders,
    	]);
    }

    public function profile()
    {
        $user = Auth::user();
        // $name = explode(' ', $user->name);
        return view('user.my-account', [
            'addresses' => $user->addresses,
            'user' => $user,
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);

        $user = Auth::user();

        $user->first_name = $request->get('f_name');
        $user->last_name = $request->get('l_name');
        // $user->email = $request->get('email');
        $user->mobile = $request->get('phone');
        $user->save();

        return redirect()->back()->with(['success' => 'Profile Updated Successfully..']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('user.index'));
    }

}
