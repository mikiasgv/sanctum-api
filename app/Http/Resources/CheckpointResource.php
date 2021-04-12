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
            "original_event_id" => $this->original_event_id,
            "original_checkpoint_id" => $this->original_checkpoint_id,
            "name"=> $this->name,
            "status"=> $this->status,
            "updated_at"=> $this->updated_at,
        ];
    }

    public function with($request)
    {
        return [
            'status' => 'OK'
        ];
    }
}
