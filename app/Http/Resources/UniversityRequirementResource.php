<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UniversityRequirementResource extends JsonResource
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
            'major_id' => $this->major_id,
            'name' => $this->name,
            'value' => $this->value,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }
}
