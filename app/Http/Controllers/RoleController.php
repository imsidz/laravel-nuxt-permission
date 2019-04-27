<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\RoleResource;

class RoleController extends Controller
{
    public function getRoles(){
    	
    	$roles = Role::latest()->paginate(30);

    	return RoleResource::collection($roles);
    }
}
