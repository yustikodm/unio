<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'biodata' => [
              'id' => $this->biodata->id,
              'fullname' => $this->biodata->fullname,
              'address' => $this->biodata->address,
              'picture' => $this->biodata->picture,
              'gender' => $this->biodata->gender,
              'school_origin' => $this->biodata->school_origin,
              'graduation_year' => $this->biodata->graduation_year,
              'birth_place' => $this->biodata->birth_place,
              'birth_date' => $this->biodata->birth_date,
              'identity_number' => $this->biodata->identity_number,
              'created_at' => Carbon::parse($this->biodata->created_at)->format('d/m/Y H:i:s'),
              'updated_at' => Carbon::parse($this->biodata->updated_at)->format('d/m/Y H:i:s'),
              'religion' => new ReligionResource($this->biodata->religion)
          ]
        ]);
    }

    if (auth()->id() == $this->id) {
        $user = array_merge($user, [
            'token' => [
                'api_token' => $this->api_token
            ]
        ]);
    }

    return $user;
  }
}
