<?php

namespace App\Http\Controllers\Home;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    /**
     * Showing contact page
     */
    public function index()
    {
        return view('frontend.contact');
    }

    /**
     * Store message to database
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'mobile' => $request->mobile,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Your message sent successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Showing message to admin
     */
    public function show_message()
    {
        $messages = Contact::latest()->get();

        return view('admin.contact', compact('messages'));
    }

    /**
     * Delete particular message
     *
     * @param integer $id
     */
    public function delete_message(int $id ){
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Message Deleted ',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
