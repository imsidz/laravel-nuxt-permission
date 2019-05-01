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

    public function getAllRoleName(){
        $roles = Role::latest()->get()->pluck('name');

        return response()->json(['data' => $roles]);
    }

    public function getRole($id){
        $role = Role::find($id);
        return new RoleResource($role);
    }

    public function editRole($id, Request $request) {
        $role = Role::find($id);

        if($role->name == 'admin'){
            return response()->json(['errors' => [
                'message' => 'You can\'t edit this role'
            ]], 422);
            
        }else {
            $role->name = $request->name;

            $role->save();
    
            $role->syncPermissions($request->permissions);
    
            return response()->json(['message' => 'Role Updated Success']);
        }
        
    }

    public function postRole (Request $request) {
            $role = new Role;    
            
            $role->name = $request->name;

            $role->save();
    
            $role->syncPermissions($request->permissions);
    
            return response()->json(['message' => 'Role Updated Success']);
    }
}
