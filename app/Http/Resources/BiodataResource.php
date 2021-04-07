<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BiodataResource extends JsonResource
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
            'fullname' => $this->fullname,
            'address' => $this->address,
            'picture' => $this->picture,
            'school_origin' => $this->school_origin,
            'graduation_year' => $this->graduation_year,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'identity_number' => $this->identity_number,
            'religion' => new ReligionResource($this->religion),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
