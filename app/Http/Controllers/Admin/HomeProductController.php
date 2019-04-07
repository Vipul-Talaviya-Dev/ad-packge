<?php

namespace App\Http\Controllers\Admin;

use Cloudder;
use App\Models\Category;
use App\Models\HomeProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeProductController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.homeProduct.index', [
            'homeProducts' => HomeProduct::paginate(10),
        ]);
    }

    public function add()
    {
        return view('admin.homeProduct.add', ['categories' => Category::parents()->get(['name', 'id'])]);
    }

    public function create(Request $request)
    {
        $file = $request->file('image');
        $this->validate($request, [
            'categoryId' => 'required|exists:categories,id',
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|numeric',
        ]);

        HomeProduct::create([
            'category_id' => $request->get('categoryId'),
            'name' => $request->get('name'),
            'image' => Cloudder::upload($file, [])->getPublicId(),
            'status' => $request->get('status'),
        ]);

        return redirect(route('admin.homeProducts'))->with('success', 'Home Product has been inserted successfully.');
    }

    public function edit($id)
    {
        if (!$homeProduct = HomeProduct::with(['category'])->find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }

        return view('admin.homeProduct.update', [
            'homeProduct' => $homeProduct,
            'categories' => Category::parents()->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!$homeProduct = HomeProduct::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }

        $this->validate($request, [
            'categoryId' => 'nullable|exists:categories,id',
            'name' => 'required',
            'status' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->file('image')) {
            \Cloudder::destroy($homeProduct->image);
            $homeProduct->image = Cloudder::upload($request->file('image'), [])->getPublicId();
        }

        if ($request->get('categoryId')) {
            $homeProduct->category_id = $request->get('categoryId');
        }
        $homeProduct->name = $request->get('name');
        $homeProduct->status = $request->get('status');
        $homeProduct->save();
        
        return redirect(route('admin.homeProducts'))->with('success', 'Home Product has been updated successfully.');
    }

    public function delete(Request $request, $id)
    {
        HomeProduct::find($id)->delete();
        return redirect(route('admin.homeProducts'));
    }
}
