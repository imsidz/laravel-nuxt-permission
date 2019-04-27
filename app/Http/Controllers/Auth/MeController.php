<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Auth;

class MeController extends Controller
{
    public function getMe(Request $request){
    	return  new UserResource($request->user());
    }
}
