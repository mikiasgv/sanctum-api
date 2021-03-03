<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'category', 'name', 'number', 'location', 'latitude', 'longitude'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
