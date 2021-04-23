<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['original_id','title', 'description', 'address', 'start', 'end', 'location', 'latitude', 'longitude', 'status'];

    protected static function boot()
    {
        parent::boot();
        Event::deleting(function ($event) {
            $event->alerts->each->delete();
            $event->places->each->delete();
            $event->checkpoints->each->delete();

        });
    }

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
