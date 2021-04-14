<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
      'type' => $this->type,
      'admission_fee' => $this->admission_fee,
      'semester_fee' => $this->semester_fee,
      'description' => $this->description,
      'university' => new UniversityResource($this->university),
      'faculty' => new UniversityFacultiesResource($this->faculty),
      'major' => new UniversityMajorResource($this->major),
      'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
      'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s')
    ];
  }
}
