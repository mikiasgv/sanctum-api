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
            "original_alert_id" => $this->original_alert_id,
            "category" => $this->category,
            "name"=> $this->name,
            "body"=> $this->body,
            "location" => $this->location,
            "latitude"=> $this->latitude,
            "longitude"=> $this->longitude,
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
