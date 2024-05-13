<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Showing footer edit page
     */
    public function edit_footer()
    {
        $footer = Footer::find(1);

        return view('admin.home_slides.footer_edit', compact('footer'));
    }

    /**
     * Update footer section 
     *
     * @param Request $request
     */
    public function update_footer(Request $request)
    {
        $footer = Footer::find(1);
        // $request->validate([
        //     'number' => 'required',
        //     'short_description' => 'required',
        //     'category' => 'required',
        // ]);

        $footer->number = $request->number;
        $footer->short_description = $request->short_description;
        $footer->address = $request->address;
        $footer->email = $request->email;
        $footer->facebook = $request->facebook;
        $footer->twitter = $request->twitter;
        $footer->copyright = $request->copyright;
        




        $footer->save();

        $notification = array(
            'message' => 'Footer Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
