<?php

namespace Absltcast\Http\Controllers;

use Absltcast\User;
use Illuminate\Http\Request;


class ProfilesController extends Controller
{
    //
	public function index(User $user)
	{
	
		return view('profile')
		->withUser($user)
		->withSeries($user->seriesBeingWatched());
	}

	public function updatePersonal(Request $request, User $user)
    {
    	if($user->username == $request->username && $user->email == $request->email)
    	{
    		$this->validate($request, [
	    		'name' => 'required',
	    		'username' => 'required',
	    		'email' => 'required',
	    	]);

	    	$user->name = $request->name;
	    	$user->save();


	        return $user;

    	} elseif($user->username == $request->username) {

    		$this->validate($request, [
	    		'name' => 'required',
	    		'username' => 'required',
	    		'email' => 'required|unique:users,email',
	    	]);

	    	$user->name = $request->name;
	    	$user->email = $request->email;
	    	
	    	$user->save();

	        return $user;

    	}	elseif($user->email == $request->email) {

    		$this->validate($request, [
	    		'name' => 'required',
	    		'username' => 'required|unique:users,username',
	    		'email' => 'required|',
	    	]);

	    	$user->name = $request->name;
	    	$user->username = $request->username;
	    	
	    	$user->save();

	        return $user;

	    }

    	
    }
}
