<?php

namespace App\Http\Controllers\Home;

// use Image;
use App\Models\HomeSlides;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    /**
     * Showing Home slider to dashboard
     */
    public function home_slider(){
        $data = HomeSlides::find(1);
        return view('admin.home_slides.home_slide', compact('data'));
    }

    public function home_slider_update(Request $request){
        $data = HomeSlides::find(1);
        $data->title = $request->title;
        $data->short_title = $request->short_title;
        $data->video_url = $request->video_url;

        if ($request->file('home_image')) {
            $file = $request->file('home_image');

            $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(636,852)->save('uploads/home_image/'.$fileName);
            $data->home_image = $fileName;
        }

        $data->save();

        $notification = array(
            'message' => 'Home Slide Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
