<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Product;
use App\ProductCategory;
use App\SubClassification;

class CollectionController extends Controller
{
    public function subcategory($id, $slug)
    {
    	$categories = ProductCategory::get();
    	$subcategory = Subcategory::where('slug', $slug)->where('status', 1)->firstOrFail();
    	$products = Product::where('sub_id', $subcategory->id)->where('live', 1)->paginate(50);

    	return view('store.collection.subcategory', compact('subcategory', 'products', 'categories'));
    }

    public function subclassification($id, $slug, $subSlug)
    {
    	$categories = ProductCategory::get();
    	$subclass = SubClassification::where('id', $id)->where('slug', $slug)->firstOrFail();
    	$products = Product::where('subclass_id', $subclass->id)->where('live', 1)->paginate(50);

		return view('store.collection.subclassification', compact('categories', 'subclass', 'products'));
    }
}
