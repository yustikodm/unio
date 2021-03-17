<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuardianResource extends JsonResource
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
            'user_id' => $this->user_id,
            'guardian_id' => $this->guardian_id,
            'username' => $this->username,
            'password' => $this->password,
            'name' => $this->name,
            'picture' => $this->picture,
            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
            'email' => $this->email,
            'nik' => $this->nik,
            'religion_id' => $this->religion_id,
            'address' => $this->address,
            'phone' => $this->phone,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }
}
