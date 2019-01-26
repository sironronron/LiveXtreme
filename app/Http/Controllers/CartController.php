<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;
use Response;
use Cart;

class CartController extends Controller
{
    public function index()
    {
    	$categories = ProductCategory::get();
    	$mightLikeProducts = Product::where('live', 1)->inRandomOrder()->take(12)->get();
    	return view('cart.index', compact('categories', 'mightLikeProducts'));
    }

    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        }); 

        if($request->ajax())
        {
            if ($duplicates->isNotEmpty()) {
                return response()->json(['fail' => "Item $request->name is already in your cart."]);
            } else {
                Cart::add($request->id, $request->name, 1, $request->price, ['size' => 'small'])
                ->associate('App\Product');
                return response()->json(['success' => 'Item Added to Cart.']);
            }
            
        } else {
            if ($duplicates->isNotEmpty()) {
                return redirect()->back()->with('success', "$request->name is already in your cart.");
            } else {
                Cart::add($request->id, $request->name, 1, $request->price, ['size' => 'small'])
                ->associate('App\Product');
                return redirect()->route('cart.index')->with('success', 'Item added to cart');

            }
            
        }
    	

    	// return redirect()->route('cart.index')->with('success', 'Item Added to Cart');
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success', 'Item has been removed!');
    }
}
