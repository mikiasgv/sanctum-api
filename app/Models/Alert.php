<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'category', 'name', 'location', 'start', 'end'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
