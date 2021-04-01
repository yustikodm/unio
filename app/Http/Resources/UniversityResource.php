<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UniversityResource extends JsonResource
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
      'state' => new StateResource($this->state),
      'district' => new DistrictResource($this->district),
      'country' => new CountryResource($this->country),
      'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
      'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s')
    ];
  }
}
