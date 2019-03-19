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
    	$orders = OrderProduct::latest()->with(['product'])->where('user_id', $user->id)->get();
    	return view('user.my-account', [
    		'orders' => $orders,
    	]);
    }

    public function profile()
    {
        $user = Auth::user();
        $name = explode(' ', $user->name);
        return view('user.my-profile', [
            'addresses' => $user->addresses,
            'user' => $user,
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'mobile' => 'required|numeric',
        ]);

        $user = Auth::user();

        $user->first_name = $request->get('firstName');
        $user->last_name = $request->get('lastName');
        $user->mobile = $request->get('mobile');
        $user->save();

        return redirect()->back()->with(['success' => 'Profile Updated Successfully..']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('user.index'));
    }

}
