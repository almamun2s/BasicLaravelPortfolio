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

    /**
     * Showing Edit Portfolio page
     *
     * @param integer $id
     */
    public function edit_portfolio(int $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('admin.portfolio.edit_portfolio', compact('portfolio'));
    }

    /**
     * Update portfolio
     *
     * @param Request $request
     * @param integer $id
     */
    public function update_portfolio(Request $request, int $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->name = $request->name;
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;

        if ($request->file('image')) {
            $file = $request->file('image');

            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            Image::make($file)->resize(636, 852)->save('uploads/portfolio/' . $fileName);
            $portfolio->image = $fileName;
        }

        $portfolio->save();

        $notification = array(
            'message' => 'Portfolio Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Delete a particular portfolio
     *
     * @param integer $id
     */
    public function delete_portfolio(int $id)
    {
        $data = Portfolio::findOrFail($id);
        $img = $data->image;
        if ($img != null) {
            unlink('uploads/portfolio/' . $img);
        }
        $data->delete();

        $notification = array(
            'message' => 'Portfolio Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
