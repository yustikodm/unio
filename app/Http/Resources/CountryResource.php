<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *w
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'code' => $this->code,
      'name' => $this->name,
      'region' => $this->region,
      'currency_code' => $this->currency_code,
      'currency_name' => $this->currency_name,
      'calling_code' => $this->calling_code,
      'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
      'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s')
    ];
  }
}
