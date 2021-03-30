<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
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
            "id"=> $this->id,
            "event_id" => $this->event_id,
            "original_place_id" => $this->original_place_id,
            "category" => $this->category,
            "name"=> $this->name,
            "rating"=> $this->rating,
            "location" => $this->location,
            "latitude"=> $this->latitude,
            "longitude"=> $this->longitude,

        ];
    }

    public function with($request)
    {
        return [
            'status' => 'OK'
        ];
    }
}
