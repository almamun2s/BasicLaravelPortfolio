<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AboutPageController extends Controller
{
    public function about_page()
    {
        $data = About::find(1);
        return view('admin.about_page.about_page', compact('data'));
    }
    public function about_page_update(Request $request)
    {
        $data = About::find(1);
        $data->title = $request->title;
        $data->short_title = $request->short_title;
        $data->short_description = $request->short_description;
        $data->long_description = $request->long_description;

        if ($request->file('about_image')) {
            $file = $request->file('about_image');

            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(523, 605)->save('uploads/home_image/' . $fileName);
            $data->about_image = $fileName;
        }

        $data->save();

        $notification = array(
            'message' => 'About Page Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
