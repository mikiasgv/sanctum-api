<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlertResource extends JsonResource
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
            "category" => $this->category,
            "name"=> $this->name,
            "location" => $this->location,
            "start"=> $this->start,
            "end"=> $this->end,

        ];
    }

    public function with($request)
    {
        return [
            'status' => 'OK'
        ];
    }
}
