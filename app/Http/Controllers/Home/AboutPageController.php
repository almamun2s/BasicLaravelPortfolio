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
        $images = MultiImage::all();
        return view('admin.about_page.multi_image', compact('images'));
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
                'created_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Multiple Images Uploaded Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    /**
     * Showing image edit page
     *
     * @param integer $id
     */
    public function image_edit(int $id)
    {
        // This function is currently not using
        // I may update this later 
    }


    /**
     * Delete Single Image
     *
     * @param integer $id
     */
    public function image_delete(int $id)
    {
        $data = MultiImage::findOrFail($id);
        $img = $data->multi_images;
        unlink('uploads/multiple_images/'. $img );
        $data->delete();

        $notification = array(
            'message' => 'Image Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
