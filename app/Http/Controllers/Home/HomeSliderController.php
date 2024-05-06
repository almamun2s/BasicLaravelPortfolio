<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlides;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    public function home_slider(){
        $data = HomeSlides::find(1);
        return view('admin.home_slides.home_slide', compact('data'));
    }
}
