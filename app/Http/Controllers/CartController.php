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

        if ($duplicates->isNotEmpty()) {
            return redirect()->back()->with('warning', "'$request->name' is already in your cart.");
        } else {
            Cart::add($request->id, $request->name, 1, $request->price, ['size' => $request->size])
            ->associate('App\Product');
            return redirect()->back()->with('success', "Item '$request->name' is added to cart");
        }
    }

    public function update (Request $request, $id)
    {
        Cart::update($id, ['qty' => $request->qty]);
        return redirect()->back()->with('success', 'Cart Updated');
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success', 'Item has been removed!');
    }

    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success', 'Item is already Saved For Later');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price, ['size' => 'small'])
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success', 'Item is saved for later');

    }
}
