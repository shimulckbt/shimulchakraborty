<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller

{
    public function onContactSend(Request $request)
    {

        $ContactArray = json_decode($request->getContent(), true);

        $name = $ContactArray['name'];
        $email = $ContactArray['email'];
        $message = $ContactArray['message'];

        $result = Contact::insert([
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    } // end method 

    public function createContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray(),
            ]);
        } else {
            $contact = new Contact();

            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->message = $request->message;

            $contact->save();

            return response()->json([
                'status' => 200,
                'message' => "Thank you for your response, I will reach you asap..!"
            ]);
        }
    }


    public function allContactMessages()
    {
        $contact = Contact::all();
        return view('backend.contact.all_contact', compact('contact'));
    } // end method 


    public function deleteContactMessage($id)
    {

        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Contact Message Delected Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end mehtod 

}
