<?php

namespace App\Http\Resources;

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
            'vendor_category_id' => $this->vendor_category_id,
            'name' => $this->name,
            'description' => $this->description,
            'picture' => $this->picture,
            'email' => $this->email,
            'back_account_number' => $this->back_account_number,
            'website' => $this->website,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'address' => $this->address,
            'phone' => $this->phone
        ];
    }
}
