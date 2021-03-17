<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UniversityFeeResource extends JsonResource
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
            'university_id' => $this->university_id,
            'faculty_id' => $this->faculty_id,
            'major_id' => $this->major_id,
            'currency_id' => $this->currency_id,
            'type' => $this->type,
            'admission_fee' => $this->admission_fee,
            'semester_fee' => $this->semester_fee,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }
}
