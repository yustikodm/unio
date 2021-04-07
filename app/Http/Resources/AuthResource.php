<?php

namespace App\Http\Resources;

use App\Models\Biodata;
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
    $fullname = '<Unknown>';
    $biodata = Biodata::where('user_id', $this->id)->first();
    
    if ($biodata){
      $fullname = $biodata->fullname;
    }

    return [
      'id' => $this->id,
      'username' => $this->username,
      'email' => $this->email,
      'email_verified_at' => $this->email_verified_at,
      'phone' => $this->phone,
      'image_path' => $this->image_path,
      'api_token' => $this->api_token,
      'fullname' => $fullname,
      'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
      'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s')
    ];
  }
}
