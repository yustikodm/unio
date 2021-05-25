<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UniversityMajorResource extends JsonResource
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
      'description' => $this->description,
      'accreditation' => $this->accreditation,
      'level' => $this->level,
      'is_checked' => $this->is_checked,
      'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
      'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s')
    ];

    if (!empty($this->u_id)) {
      $output = array_merge($output, [
        'university' => [
          'id' => $this->u_id,
          'name' => $this->u_name,
          'address' => $this->u_address,
          'logo_src' => $this->u_logo_src,
          'header_src' => $this->u_header_src,
          'type' => $this->u_type,
          'accreditation' => $this->u_accreditation,
          'description' => $this->u_description,
          'created_at' => Carbon::parse($this->u_created_at)->format('d/m/Y H:i:s'),
          'updated_at' => Carbon::parse($this->u_updated_at)->format('d/m/Y H:i:s')
        ]
      ]);
    } else {
      $output = array_merge($output, [
        'university' => new UniversityResource($this->university)
      ]);
    }

    if (!empty($this->f_id)) {
      $output = array_merge($output, [
        'faculty' => [
          'id' => $this->f_id,
          'name' => $this->f_name,
          'description' => $this->f_description,
          'created_at' => Carbon::parse($this->u_created_at)->format('d/m/Y H:i:s'),
          'updated_at' => Carbon::parse($this->u_updated_at)->format('d/m/Y H:i:s')
        ]
      ]);
    } else {
      $output = array_merge($output, [
        'faculty' => new UniversityFacultiesResource($this->faculty)
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
    }

    return $output;
  }
}
