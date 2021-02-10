<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'start', 'end', 'location', 'status'];

    public function planner()
    {
        return $this->belongsTo(User::class, 'planner_id');
    }
}
