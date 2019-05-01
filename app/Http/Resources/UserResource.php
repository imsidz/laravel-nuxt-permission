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
            return [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'roles' => $this->roles->pluck('name'),
                'permissions' => $this->getPermissionsViaRoles()->pluck('name'),
                'image' => \Gravatar::src($this->email, 200)
            ];
    }
}
