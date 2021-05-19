<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorServiceResource extends JsonResource
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
      'header_src' => $this->picture,
      'price' => $this->price,
      'level' => $this->level,
      'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
      'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s')
    ];

    if (!empty($this->v_id)) {
      $output = array_merge($output,[
        'vendor' => [
          'id' => $this->v_id,
          'name' => $this->v_name,
          'description' => $this->v_description,
          'logo_src' => $this->v_logo_src,
          'header_src' => $this->v_header_src,
          'email' => $this->v_email,
          'bank_account_number' => $this->v_bank_account_number,
          'website' => $this->v_website,
          'address' => $this->v_address,
          'phone' => $this->v_phone,
          'created_at' => Carbon::parse($this->v_created_at)->format('d/m/Y H:i:s'),
          'updated_at' => Carbon::parse($this->v_updated_at)->format('d/m/Y H:i:s')
        ]
      ]);
    } else {
      $output = array_merge($output,[
          'vendor' => new VendorResource($this->vendor),
      ]);
    }

    if (!empty($this->c_id)) {
      $output = array_merge($output,[
        'vendor' => [
          'country' => [
            'id' => $this->c_id,
            'name' => $this->c_name,
            'created_at' => Carbon::parse($this->c_created_at)->format('d/m/Y H:i:s'),
            'updated_at' => Carbon::parse($this->c_updated_at)->format('d/m/Y H:i:s')
          ]
        ]
      ]);
    }

    if (!empty($this->s_id)) {
      $output = array_merge($output,[
        'vendor' => [
          'state' => [
            'id' => $this->s_id,
            'name' => $this->s_name,
            'created_at' => Carbon::parse($this->s_created_at)->format('d/m/Y H:i:s'),
            'updated_at' => Carbon::parse($this->s_updated_at)->format('d/m/Y H:i:s')
          ]
        ]
      ]);
    }

    if (!empty($this->d_id)) {
      $output = array_merge($output,[
        'vendor' => [
          'district' => [
            'id' => $this->d_id,
            'name' => $this->d_name,
            'created_at' => Carbon::parse($this->d_created_at)->format('d/m/Y H:i:s'),
            'updated_at' => Carbon::parse($this->d_updated_at)->format('d/m/Y H:i:s')
          ]
        ]
      ]);
    }

    return $output;
  }
}
