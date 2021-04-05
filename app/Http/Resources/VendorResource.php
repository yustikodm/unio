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
    return [
      'id' => $this->id,
      'name' => $this->name,
      'description' => $this->description,
      'picture' => $this->picture,
      'email' => $this->email,
      'back_account_number' => $this->back_account_number,
      'website' => $this->website,
      'address' => $this->address,
      'phone' => $this->phone,
      'vendor_category' => new VendorCategoryResource($this->vendor_category),
      'country' => new CountryResource($this->country),
      'state' => new StateResource($this->state),
      'district' => new DistrictResource($this->district),
      'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
      'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s')
    ];
  }
}
