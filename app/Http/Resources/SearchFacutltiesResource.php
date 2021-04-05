<?php

namespace App\Http\Resources;

use App\Models\UniversityMajor;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchFacutltiesResource extends JsonResource
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
          'description' => $this->description,
          'majors' => UniversityMajor::apiSearchByFaculties($this->id),
          'universities' => new UniversityResource($this->university),
        ];
    }
}
