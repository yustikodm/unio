<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MajorPredictionResource extends JsonResource
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
            'major_id' => $this->major_id,
            'major_name' => $this->major_name,
            'fos' => $this->fos,
            'man_check' => $this->man_check,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
