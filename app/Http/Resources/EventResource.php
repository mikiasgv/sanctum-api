<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            "planner_id"=> $this->planner_id,
            "title"=> $this->title,
            "description"=> $this->description,
            "start"=> $this->start,
            "end"=> $this->end,
            "location"=> $this->location,
            "latitude"=> $this->latitude,
            "longitude"=> $this->longitude,
            "status"=> $this->status
        ];
    }

    public function with($request)
    {
        return [
            'status' => 'OK'
        ];
    }
}
