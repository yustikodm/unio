<?php

namespace App\Http\Resources;

use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
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
      'entity_id' => $this->entity_id,
      'entity_type' => $this->entity_type,
      'user' => new UserResource($this->user),
      'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
      'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s')
    ];
  }
}
