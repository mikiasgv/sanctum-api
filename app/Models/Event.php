<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['original_id','title', 'description', 'start', 'end', 'location', 'latitude', 'longitude', 'status'];

    public function planner()
    {
        return $this->belongsTo(User::class, 'planner_id');
    }

    public function checkpoints()
    {
        return $this->hasMany(Checkpoint::class);
    }

    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }

    public function places()
    {
        return $this->hasMany(Place::class);
    }
}
