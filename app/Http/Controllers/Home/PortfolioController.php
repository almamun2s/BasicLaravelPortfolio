<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Showing Portfolio page to admin
     */
    public function portfolio_page(){
        $portfolios = Portfolio::latest()->get();

        return view('admin.portfolio.portfolio_page', compact('portfolios'));
    }

    /**
     * Store Portfolio data to Database
     *
     * @param Request $request
     */
    public function store_portfolio(Request $request){

    }
}
