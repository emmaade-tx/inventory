<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function postUser(Request $request)
    {
    	$this->validate($request, [
    		'username' => 'required|unique:users',
            'name'     => 'required',
            'password' => 'required',
        ]);
    	$user = User::create($request->all());
    	if ($user) {
    		return response()->json(['message' => 'user created succesfully created'], 201);
    	}

    	return response()->json(['message' => 'user creation unsuccesfully'], 400);
    }
}
