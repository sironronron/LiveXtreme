<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $randomCollection = Product::inRandomOrder()->where('live', 1)->take(8)->get();
        $date = Carbon::now();
        $latests = Product::whereDate('created_at', $date)
            ->orderBy('created_at', 'desc')
            ->where('live', 1)->take(8)->get();
        $categories = ProductCategory::get();
        $girlPower = Product::where('live' ,1)->where('cat_id', 2)->take(8)->get();
        return view('home', compact('randomCollection', 'categories', 'latests', 'girlPower'));
    }
}
