<?php

namespace App\Http\Controllers\Admin\ServiceProvides;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Image;

class ServiceController extends Controller
{
	public function serviceView()
	{

		$services = Services::latest()->get();
		return $services;
	} // end method 


	public function allServices()
	{
		$service = Services::all();
		return view('backend.service.all_service', compact('service'));
	} // end method 


	public function addService()
	{

		return view('backend.service.add_service');
	} // end method 



	public function storeService(Request $request)
	{

		$request->validate([
			'service_name' => 'required',
			'service_description' => 'required',
			'service_logo' => 'required',
		], [
			'service_name.required' => 'Input Service Name',
			'service_description.required' => 'Input Service Description',

		]);

		$image = $request->file('service_logo');
		$name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
		Image::make($image)->resize(512, 512)->save('upload/service/' . $name_gen);
		$save_url = env('APP_URL') . '/upload/service/' . $name_gen;

		Services::insert([
			'service_name' => $request->service_name,
			'service_discription' => $request->service_description,
			'service_logo' => $save_url,
		]);

		$notification = array(
			'message' => 'Service Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('all.services')->with($notification);
	} // end method 



	public function editService($id)
	{

		$services = Services::findOrFail($id);
		return view('backend.service.edit_service', compact('services'));
	} // end method 


	public function updateService(Request $request)
	{

		$service_id = $request->id;

		if ($request->file('service_logo')) {

			$image = $request->file('service_logo');
			$name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(512, 512)->save('upload/service/' . $name_gen);
			$save_url = env('APP_URL') . '/upload/service/' . $name_gen;

			Services::findOrFail($service_id)->update([

				'service_name' => $request->service_name,
				'service_discription' => $request->service_description,
				'service_logo' => $save_url,
			]);

			$notification = array(
				'message' => 'Service Updated Successfully',
				'alert-type' => 'success'
			);

			return redirect()->route('all.services')->with($notification);
		} else {

			Services::findOrFail($service_id)->update([

				'service_name' => $request->service_name,
				'service_discription' => $request->service_description,

			]);

			$notification = array(
				'message' => 'Service Updated Without Image Successfully',
				'alert-type' => 'success'
			);

			return redirect()->route('all.services')->with($notification);
		}
	} // end method 


	public function deleteService($id)
	{

		Services::findOrFail($id)->delete();

		$notification = array(
			'message' => 'Service Delected Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	} // end mehtod 




}
