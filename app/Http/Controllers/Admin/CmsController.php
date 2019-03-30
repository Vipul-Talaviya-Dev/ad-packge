<?php

namespace App\Http\Controllers\Admin;

use Cloudder;
use App\Models\Cms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{
	public function index(Request $request)
	{
		return view('admin.cms.index', [
			'cmses' => Cms::get()
		]);
	}

	public function edit(Request $request, $id)
	{
		if(!$cms = Cms::find($id)) {
			return redirect()->back()->with('error', 'Invalid Selected Id');
		}

		return view('admin.cms.edit', [
			'cms' => $cms
		]);
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title' => 'required',
			'description' => 'required',
		]);

		if(!$cms = Cms::find($id)) {
			return redirect()->back()->with('error', 'Invalid Selected Id');
		}

		// $cms->title = $request->get('title');
		$cms->description = $request->get('description');
		$cms->save();

		return redirect()->back()->with('success', 'Successfully Updated.');
	}
}
