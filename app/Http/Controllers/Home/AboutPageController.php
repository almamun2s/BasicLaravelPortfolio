<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AboutPageController extends Controller
{
    /**
     * Showing about page update section
     */
    public function about_page()
    {
        $data = About::find(1);
        return view('admin.about_page.about_page', compact('data'));
    }

    /**
     * Updating About page Data
     *
     * @param Request $request
     */
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

    /**
     * Showing about page Multi Image section
     */
    public function about_multi_image()
    {
        return view('admin.about_page.multi_image');
    }


    /**
     * Uploading Multiple Images
     *
     * @param Request $request
     */
    public function about_multi_image_update(Request $request)
    {
        $images = $request->file('multi_images');

        foreach ($images as $image) {
            $fileName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save('uploads/multiple_images/' . $fileName);
            MultiImage::insert([
                'multi_images' => $fileName,
                'created_at'    => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Multiple Images Uploaded Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
