<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopupHistoryResource extends JsonResource
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
            'user' => new UserResource($this->user),
            'country' => new CountryResource($this->country),
            'package' => new TopupPackageResource($this->package),
            'code' => $this->code,
            'amount' => $this->amount,
            'payment_method' => $this->payment_method,
            'payment_trans' => $this->payment_trans,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
