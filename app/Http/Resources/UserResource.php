<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    $user = [
      'id' => $this->id,
      'username' => $this->username,
      'email' => $this->email,
      'phone' => $this->phone,
      'email_verified_at' => $this->email_verified_at,
      'image_path' => $this->image_path,
      'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
      'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s'),
    ];

    if (!empty($this->biodata->id)) {
      $user = array_merge($user, [
        'biodata' => new BiodataResource($this->biodata)
      ]);
    }

    // if (Auth::id() == $this->id || Auth::user()->hasRole('admin')) {
    if (Auth::id() == $this->id) {
      $user = array_merge($user, [
        'token' => [
          'api_token' => $this->api_token
        ]
      ]);
    }

    return $user;
  }
}
