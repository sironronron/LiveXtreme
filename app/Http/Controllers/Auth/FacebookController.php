<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;
use App\User;

class FacebookController extends Controller
{
    /**
    * Create a new controller instance
    *
    * @return void
    */
    public function redirectToFacebook()
    {
    	return Socialite::driver('facebook')->redirect();
    }

    /**
    * Create a new controller instance
    *
    * @return void
    */
    public function handleFacebookCallback()
    {
    	try {
    		$user = Socialite::driver('facebook')->user();
    		$create['avatar'] = $user->getAvatar();
    		$create['name'] = $user->getName();
    		$create['email'] = $user->getEmail();
    		$create['facebook_id'] = $user->getId();

    		$userModel = new User;
    		$createdUser = $userModel->addNew($create);
    		Auth::loginUsingId($createdUser->id);

    		return redirect()->route('welcome')->with('succes', 'Congratulations! Thank you for Registering with us.');

    	} catch (Exception $e) {
    		return redirect('auth/facebook');
    	}
    }
}
