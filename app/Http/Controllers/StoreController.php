<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use App\Jobs\ProcessView;

class StoreController extends Controller
{
	public function index()
	{
		$products = Product::where('live', 1)->inRandomOrder()->paginate(12);
        $categories = ProductCategory::get();
		return view('store.list.all.index', compact('products', 'categories'));
	}

    public function show(Product $product, $id, $slug)
    {
    	$product = Product::where('slug', $slug)->where('live', 1)->firstOrFail();
        ProcessView::dispatch($product)->delay(now()->addMinutes(5));
    	$categories = ProductCategory::get();
		$mightLikeProducts = Product::where('slug', '!=', $slug)->where('live', 1)->inRandomOrder()->take(12)->get();

    	return view('store.product.show', compact('product', 'categories', 'mightLikeProducts'));
    }
}
