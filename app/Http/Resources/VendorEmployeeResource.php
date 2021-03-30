<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorEmployeeResource extends JsonResource
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
      'birthdate' => $this->birthdate,
      'position' => $this->position,
      'phone' => $this->phone,
      'email' => $this->email,
      'address' => $this->address,
      'picture' => $this->picture,
      'description' => $this->description,
      'vendor' => new VendorResource($this->vendor),
      'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
      'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s')
    ];
  }
}
