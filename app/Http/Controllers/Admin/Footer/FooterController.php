<?php

namespace App\Http\Controllers\Admin\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
	public function onSelectAll()
	{

		$result = Footer::all();
		return $result;
	} // end mehtod 

	public function addFooterContent()
	{
		return view('backend.footer.add_footer');
	}

	public function storeFooterContent(Request $request)
	{
		Footer::create([
			'address' => $request->address,
			'email' => $request->email,
			'phone' => $request->phone,
			'facebook' => $request->facebook,
			'youtube' => $request->youtube,
			'twitter' => $request->twitter,
			'instagram' => $request->instagram,
			'github' => $request->github,
			'linkedin' => $request->linkedin,
			'stackoverflow' => $request->stackoverflow,
			'footer_credit' => $request->footer_credit,
		]);

		$notification = array(
			'message' => 'Footer Created Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('add.footer.content')->with($notification);
	}

	public function allFooterContents()
	{
		$footer = Footer::all();
		return view('backend.footer.all_footer', compact('footer'));
	} // end mehtod 


	public function editFooterContent($id)
	{
		$footer = Footer::findOrFail($id);
		return view('backend.footer.edit_footer', compact('footer'));
	} // end mehtod 


	public function updateFooterContent(Request $request)
	{
		$footer_id = $request->id;

		Footer::findOrFail($footer_id)->update([

			'address' => $request->address,
			'email' => $request->email,
			'phone' => $request->phone,
			'facebook' => $request->facebook,
			'youtube' => $request->youtube,
			'twitter' => $request->twitter,
			'instagram' => $request->instagram,
			'github' => $request->github,
			'linkedin' => $request->linkedin,
			'stackoverflow' => $request->stackoverflow,
			'footer_credit' => $request->footer_credit,

		]);

		$notification = array(
			'message' => 'Footer Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('all.footer.content')->with($notification);
	} // end mehtod 


}
