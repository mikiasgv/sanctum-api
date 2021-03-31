<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'original_event_id', 'original_alert_id', 'category', 'name', 'body', 'location', 'latitude', 'longitude', 'start', 'end'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
