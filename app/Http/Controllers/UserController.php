<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use Auth;

class UserController extends Controller
{
    public function index()
    {
    	$categories = ProductCategory::all();
    	return view('member.profile.index', compact('categories'));
    }
}
