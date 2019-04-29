<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Auth;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $roles = $this->roles;
        if ($roles) {
            foreach ($roles as $role) {
                $permissions = $role->permissions;
            }
            if (!isset($permissions)) {
                $permissions = [];
            }else{
                $permissions = $permissions->pluck('name');
            }
            return [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'roles' => $this->roles->pluck('name'),
                'permissions' => $permissions,
                'image' => \Gravatar::src($this->email, 200)
            ];
        }
    }
}
