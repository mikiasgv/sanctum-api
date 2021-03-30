<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'original_place_id', 'category', 'name', 'rating', 'location', 'latitude', 'longitude'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
