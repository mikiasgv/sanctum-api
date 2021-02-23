<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CheckpointResource extends JsonResource
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
            'event_id' => $this->event_id,
            "name"=> $this->name,
            "status"=> $this->status,
        ];
    }

    public function with($request)
    {
        return [
            'status' => 'OK'
        ];
    }
}
