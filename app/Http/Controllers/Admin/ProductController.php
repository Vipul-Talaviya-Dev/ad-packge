<?php

namespace App\Http\Controllers\Admin;

use Session;
use Cloudder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Variation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.product.index', [
            'categories' => Category::all(),
            'products' => Product::latest()->paginate(10)
        ]);
    }

    public function add()
    {
        return view('admin.product.add', [
            'categories' => Category::parents()->active()->get(),
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'categoryId' => 'required|exists:categories,id',
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'qty' => 'required|numeric|min:1',
            'shipping_charge' => 'required|numeric|min:0',
            'thumbImage' => 'required|image|max:2048',
            'height_with_length' => 'required',
            'piece' => 'required|numeric|min:1',
            'pack' => 'required|numeric|min:1', // bundle
            'weight' => 'required|numeric|min:0',
            'first_box_price' => 'required|numeric|min:1',
            'second_box_price' => 'required|numeric|min:1',
            'third_box_price' => 'required|numeric|min:1',
            'four_box_price' => 'required|numeric|min:1',
            'description' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);

        // dd($request->all());
        $pricePerBox = [
            'first_100' => $request->get('first_box_price'),
            'second_250' => $request->get('second_box_price'),
            'third_500' => $request->get('third_box_price'),
            'four_1001' => $request->get('four_box_price'),
        ];
        $lastId = (Product::latest()->first() ? Product::latest()->first()->id : 1);
        $product = Product::create([
            'category_id' => $request->get('categoryId'),
            'name' => trim($request->get('name')),
            'slug' => trim(str_slug($request->get('name')).date('YmdHis').$lastId),
            'price' => $request->get('price'),
            'shipping_charge' => $request->get('shipping_charge'),
            'qty' => $request->get('qty'),
            'image' => Cloudder::upload($request->file('thumbImage'), [])->getPublicId(),
            'weight' => $request->get('weight'),
            'piece' => $request->get('piece'),
            'pack' => $request->get('pack'),
            'height_with_length' => $request->get('height_with_length'),
            'prices_box' => json_encode($pricePerBox),
            'description' => $request->get('description'),
            'meta_keyword' => $request->get('meta_keyword'),
            'meta_description' => $request->get('meta_description'),
        ]);

        return redirect(route('admin.products'))->with('success','Product has been inserted successfully.');        
    }

    public function edit($id)
    {
        if(!$product = Product::with(['category'])->find($id)) {
            return redirect()->back()->with(['error' => 'Invalid Selected Id.']);
        }

        return view('admin.product.update', [
            'product' => $product,
            'categories' => Category::parents()->active()->get(),
        ]);

        return view('admin.product.update');
    }

    public function update(Request $request, $id)
    {
        if(!$product = Product::with(['category'])->find($id)) {
            return redirect()->back()->with(['error' => 'Invalid Selected Id.']);
        }

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'qty' => 'required|numeric|min:1',
            'shipping_charge' => 'required|numeric|min:0',
            'thumbImage' => 'nullable|image|max:2048',
            'height_with_length' => 'required',
            'piece' => 'required|numeric|min:1',
            'pack' => 'required|numeric|min:1', // bundle
            'weight' => 'required|numeric|min:0',
            'first_box_price' => 'required|numeric|min:1',
            'second_box_price' => 'required|numeric|min:1',
            'third_box_price' => 'required|numeric|min:1',
            'four_box_price' => 'required|numeric|min:1',
            'description' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);
        $pricePerBox = [
            'first_100' => $request->get('first_box_price'),
            'second_250' => $request->get('second_box_price'),
            'third_500' => $request->get('third_box_price'),
            'four_1001' => $request->get('four_box_price'),
        ];
        if ($request->get('categoryId')) {
            $product->category_id = $request->get('categoryId');
        }
        if ($request->file('thumbImage')) {
            $product->image = Cloudder::upload($request->file('thumbImage'), [])->getPublicId();
        }

        $product->name = trim($request->get('name'));
        $product->slug = trim(str_slug($request->get('name')).date('YmdHis').$id);
        $product->price = $request->get('price');
        $product->shipping_charge = $request->get('shipping_charge');
        $product->qty = $request->get('qty');
        $product->weight = $request->get('weight');
        $product->piece = $request->get('piece');
        $product->pack = $request->get('pack');
        $product->height_with_length = $request->get('height_with_length');
        $product->prices_box = json_encode($pricePerBox);
        $product->description = $request->get('description');
        $product->meta_keyword = $request->get('meta_keyword');
        $product->meta_description = $request->get('meta_description');
        $product->status = $request->get('status') == 2 ? 0 : 1;
        $product->save();

        return redirect(route('admin.products'))->with('success', 'Product has been updated successfully.');
    }

    public function subCategory(Request $request)
    {
        return response()->json([
            'status' => true,
            'categories' => Category::active()->where('parent_id', $request->get('id'))->get(['id', 'name'])
        ]);
    }
}
