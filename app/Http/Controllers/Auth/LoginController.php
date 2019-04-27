<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    public function login(Request $request){

    	
    	$this->validate($request, [
    		'email' => 'email|required',
    		'password' => 'string|required',
    	]);

    	$token = auth()->attempt($request->only(['email', 'password']));

    	if (!$token) {
    		return response()->json([
    			'errors' => [
    				'email' => [
    					'Your Credential not matched in our records'
    				],
                    'password' => [
                        'Your Credential not matched in our records'
                    ]
    			]
    		], 422);
    	}

    	return (new UserResource($request->user()))
		->additional([
			'meta' => [
				'token' => $token
			]
		]);
    }
}
