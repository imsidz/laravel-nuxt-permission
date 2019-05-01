<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PermissionResource;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function getPermissionsName(){
        $permissions = Permission::get()->pluck('name');
        return response()->json(['data' => $permissions]);
        // return PermissionResource::collection($permissions);
    }
}
