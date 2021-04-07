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
      if (empty($this->um_id)) {
        return [
          'id' => $this->id,
          'name' => $this->name,
          'description' => $this->description,
          // 'majors' => UniversityMajor::apiSearchByFaculties($this->id),
          'universities' => [
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
            // 'majors' => UniversityMajor::apiSearchByUniversities($this->id),
          ],
        ];
      }
    }
}
