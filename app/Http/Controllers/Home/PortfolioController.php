<?php

namespace App\Http\Controllers\Home;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    /**
     * Showing Portfolio page to admin
     */
    public function portfolio_page()
    {
        $portfolios = Portfolio::latest()->get();

        return view('admin.portfolio.portfolio_page', compact('portfolios'));
    }

    /**
     * Store Portfolio data to Database
     *
     * @param Request $request
     */
    public function store_portfolio(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Please provide Portfolio name',
            'title.required' => 'Please provide Portfolio title',
        ]);

        // dd($request->name);
        $fileName = null;
        if ($request->file('image')) {
            $file = $request->file('image');

            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(636, 852)->save('uploads/portfolio/' . $fileName);
            // $data->image = $fileName;
        }
        Portfolio::insert([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $fileName,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Portfolio added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
