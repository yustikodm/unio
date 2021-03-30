<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'school_origin' => $this->school_origin,
            'graduation_year' => $this->graduation_year,
            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
            'email' => $this->email,
            'nik' => $this->nik,
            'religion_id' => $this->religion_id,
            'address' => $this->address,
            'phone' => $this->phone,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s'),
            'deleted_at' => Carbon::parse($this->deleted_at)->format('d/m/Y H:i:s')
        ];
    }
}
