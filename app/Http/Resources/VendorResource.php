<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
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
          'logo' => $this->logo,
          'header_img' => $this->header_img,
          'email' => $this->email,
          'back_account_number' => $this->back_account_number,
          'website' => $this->website,
          'address' => $this->address,
          'phone' => $this->phone,
          'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
          'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s')
      ];

    if (!empty($this->vc_id)) {
      $output = array_merge($output,[
        'vendor_category' => [
          'id' => $this->vc_id,
          'name' => $this->vc_name,
          'description' => $this->vc_description,
          'created_at' => Carbon::parse($this->vc_created_at)->format('d/m/Y H:i:s'),
          'updated_at' => Carbon::parse($this->vc_updated_at)->format('d/m/Y H:i:s')
        ]
      ]);
    } else {
      $output = array_merge($output,[
          'vendor_category' => new VendorCategoryResource($this->vendor_category),
      ]);
    }

    if (!empty($this->c_id)) {
      $output = array_merge($output,[
        'country' => [
          'id' => $this->c_id,
          'name' => $this->c_name,
          'created_at' => Carbon::parse($this->c_created_at)->format('d/m/Y H:i:s'),
          'updated_at' => Carbon::parse($this->c_updated_at)->format('d/m/Y H:i:s')
        ]
      ]);
    } else {
      $output = array_merge($output,[
        'country' => new CountryResource($this->country),
      ]);
    }

    if (!empty($this->s_id)) {
      $output = array_merge($output,[
        'state' => [
          'id' => $this->s_id,
          'name' => $this->s_name,
          'created_at' => Carbon::parse($this->s_created_at)->format('d/m/Y H:i:s'),
          'updated_at' => Carbon::parse($this->s_updated_at)->format('d/m/Y H:i:s')
        ]
      ]);
    } else {
      $output = array_merge($output,[
        'state' => new StateResource($this->state),
      ]);
    }

    if (!empty($this->d_id)) {
      $output = array_merge($output,[
        'district' => [
          'id' => $this->d_id,
          'name' => $this->d_name,
          'created_at' => Carbon::parse($this->d_created_at)->format('d/m/Y H:i:s'),
          'updated_at' => Carbon::parse($this->d_updated_at)->format('d/m/Y H:i:s')
        ]
      ]);
    } else {
      $output = array_merge($output,[
        'district' => new DistrictResource($this->district),
      ]);
    }

    return $output;
  }
}
