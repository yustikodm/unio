<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PointLogResource extends JsonResource
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
            'parent' => new UserResource($this->parent),
            'transaction_id' => new TransactionResource($this->transaction),
            'type' => $this->type,
            'point_before' => $this->point_before,
            'point_amount' => $this->point_amount,
            'point_after' => $this->point_after,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i:s')
        ];
    }
}
