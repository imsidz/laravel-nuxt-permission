<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function getUsers(){
    	$users = User::get();

    	return UserResource::collection($users);
    }

    public function getUser($id){
        $user = User::find($id);
        
        return new UserResource($user);
    }

    public function editUser($id, Request $request) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $user->syncRoles($request->roles);

        return response()->json(['message' => 'User Saved Success']);
    }
}
