<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$ids = Product::search($request->queue)->get()->pluck('id');
    	$products = Product::whereIn('id', $ids)->where('live', 1)->paginate(53);
    	$categories = ProductCategory::all();

    	return view('search', compact('products', 'categories'));
    }
}
