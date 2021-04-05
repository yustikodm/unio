<?php

namespace App\Http\Resources;

use App\Models\UniversityMajor;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchUniversitiesResource extends JsonResource
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
          'address' => $this->address,
          'logo_src' => $this->logo_src,
          'type' => $this->type,
          'accreditation' => $this->accreditation,
          'description' => $this->description,
          'majors' => UniversityMajor::apiSearchByUniversities($this->id),
          'district' => new DistrictResource($this->district),
          'state' => new StateResource($this->state),
          'country' => new CountryResource($this->country),
        ];
    }
}
