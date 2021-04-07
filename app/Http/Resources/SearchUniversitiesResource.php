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
    if (empty($this->um_id)) {
      return [
        'id' => $this->id,
        'name' => $this->name,
        'address' => $this->address,
        'logo_src' => $this->logo_src,
        'type' => $this->type,
        'accreditation' => $this->accreditation,
        'description' => $this->description,
        'district' => new DistrictResource($this->district),
        'state' => new StateResource($this->state),
        'country' => new CountryResource($this->country),
        'majors' => UniversityMajor::apiSearchByUniversities($this->id),
      ];
    }

    return [
      'id' => $this->u_id,
      'name' => $this->u_name,
      'address' => $this->u_address,
      'logo_src' => $this->u_logo_src,
      'type' => $this->u_type,
      'accreditation' => $this->u_accreditation,
      'description' => $this->u_description,
      'district' => new DistrictResource($this->district),
      'state' => new StateResource($this->state),
      'country' => new CountryResource($this->country),
      'majors' => [
        'id' => $this->um_id,
        'university_id' => $this->um_university_id,
        'faculty_id' => $this->um_faculty_id,
        'name' => $this->um_name,
        'description' => $this->um_description,
        'accreditation' => $this->um_accreditation,
        'temp' => $this->um_temp,
      ],
    ];
  }
}
