<?php

namespace App\Http\Controllers\Admin\Information;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
	public function onSelectAll()
	{

		$result = Information::all();
		return $result;
	} // end mehtod 


	public function allInformation()
	{
		$result = Information::all();
		return view('backend.information.all_information', compact('result'));
	} // end method 



	public function addInformation()
	{
		return view('backend.information.add_information');
	} // end method 


	public function storeInformation(Request $request)
	{

		Information::insert([
			'about' => $request->about,
			'refund' => $request->refund,
			'trems' => $request->trems,
			'privacy' => $request->privacy,

		]);
		$notification = array(
			'message' => 'Information Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('all.information')->with($notification);
	} // end method 


	public function editInformation($id)
	{

		$information = Information::findOrFail($id);
		return view('backend.information.edit_inforamtion', compact('information'));
	} // end method 


	public function updateInformation(Request $request, $id)
	{

		Information::findOrFail($id)->update([
			'about' => $request->about,
			'refund' => $request->refund,
			'trems' => $request->trems,
			'privacy' => $request->privacy,

		]);
		$notification = array(
			'message' => 'Information Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.information')->with($notification);
	} // end method 



	public function deleteInformation($id)
	{

		Information::findOrFail($id)->delete();

		$notification = array(
			'message' => 'Information Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
	} // end mehtod 


}
