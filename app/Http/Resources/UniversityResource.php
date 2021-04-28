<?php

namespace App\Http\Resources;

use App\Models\UniversityMajor;
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
    $output = [
      'id' => $this->id,
      'name' => $this->name,
      'address' => $this->address,
      'logo' => $this->logo,
      'header_img' => $this->header_img,
      'type' => $this->type,
      'accreditation' => $this->accreditation,
      'description' => $this->description,
      'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
      'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s')
    ];

    if (!empty($this->um_id)) {
      $output = array_merge($output, [
        'major' => [
          'id' => $this->um_id,
          'university_id' => $this->um_university_id,
          'faculty_id' => $this->um_faculty_id,
          'name' => $this->um_name,
          'description' => $this->um_description,
          'accreditation' => $this->um_accreditation,
          'level' => $this->um_level,
          'created_at' => Carbon::parse($this->um_created_at)->format('d/m/Y H:i:s'),
          'updated_at' => Carbon::parse($this->um_updated_at)->format('d/m/Y H:i:s')
        ]
      ]);
    }

    if (!empty($this->c_id)) {
      $output = array_merge($output, [
        'country' => [
          'id' => $this->c_id,
          'name' => $this->c_name,
          'created_at' => Carbon::parse($this->c_created_at)->format('d/m/Y H:i:s'),
          'updated_at' => Carbon::parse($this->c_updated_at)->format('d/m/Y H:i:s')
        ]
      ]);
    } else {
      $output = array_merge($output, [
        'country' => new CountryResource($this->country),
      ]);
    }

    if (!empty($this->s_id)) {
      $output = array_merge($output, [
        'state' => [
          'id' => $this->s_id,
          'name' => $this->s_name,
          'created_at' => Carbon::parse($this->s_created_at)->format('d/m/Y H:i:s'),
          'updated_at' => Carbon::parse($this->s_updated_at)->format('d/m/Y H:i:s')
        ]
      ]);
    } else {
      $output = array_merge($output, [
        'state' => new StateResource($this->state),
      ]);
    }

    if (!empty($this->d_id)) {
      $output = array_merge($output, [
        'district' => [
          'id' => $this->d_id,
          'name' => $this->d_name,
          'created_at' => Carbon::parse($this->d_created_at)->format('d/m/Y H:i:s'),
          'updated_at' => Carbon::parse($this->d_updated_at)->format('d/m/Y H:i:s')
        ]
      ]);
    } else {
      $output = array_merge($output, [
        'district' => new DistrictResource($this->district),
      ]);
    }

    return $output;
  }
}
