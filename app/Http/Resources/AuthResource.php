<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
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
      'username' => $this->username,
      'email' => $this->email,
      'image_path' => $this->image_path,
      'joined' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
      'api_token' => $this->api_tokenw
    ];
  }
}
