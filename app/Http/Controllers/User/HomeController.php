<?php

namespace App\Http\Controllers\User;

use App\Models\Cms;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\AppContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
    	return view('user.index', [
    		'appContent' => AppContent::find(1),
            'banners' => Banner::active()->get()
    	]);
    }

    public function aboutUs()
    {
    	return view('user.about-us');
    }

    public function contactUs()
    {
        return view('user.contact-us');
    }

    public function contactAdd(Request $request)
    {
        $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'note' => 'required',
        ]);

        Contact::create([
            'first_name' => $request->get('f_name'),
            'last_name' => $request->get('l_name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('phone'),
            'message' => $request->get('note'),
        ]);

        return redirect()->back()->with('success', 'Thanks you for contact us.');  
    }

    public function faq()
    {
        return view('user.faq', [
            'faq' => Cms::find(1)
        ]);
    }

    public function termsCondition()
    {
        return view('user.terms-condition', [
            'terms' => Cms::find(2)
        ]);
    }
}
