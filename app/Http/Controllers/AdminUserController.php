<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
	public function adminLogout()
	{
		Auth::logout();
		return Redirect()->route('login');
	} // end mehtod 

	public function userProfile()
	{
		$id = Auth::user()->id;
		$user = User::find($id);

		return view('backend.user.user_profile', compact('user'));
	} // end mehtod 


	public function userProfileEdit()
	{
		$id = Auth::user()->id;
		$user = User::find($id);

		return view('backend.user.user_profile_edit', compact('user'));
	} // end mehtod 

	public function userProfileStore(Request $request)
	{

		$data = User::find(Auth::user()->id);
		$data->name = $request->name;
		$data->email = $request->email;

		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/user_images/' . $data->profile_photo_path));
			$filename = date('YmdHi') . $file->getClientOriginalName();
			$file->move(public_path('upload/user_images'), $filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => 'User Profile Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('user.profile')->with($notification);
	} // end mehtod 


	public function userChangePassword()
	{
		$id = Auth::user()->id;
		$user = User::find($id);
		return view('backend.user.change_password', compact('user'));
	}  // end method 



	public function userPasswordUpdate(Request $request)
	{

		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed'

		]);

		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword, $hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('admin.logout');
		} else {
			return redirect()->back();
		}
	} // end mehtod 
}
