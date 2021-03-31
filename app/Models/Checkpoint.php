<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'original_event_id', 'name', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
