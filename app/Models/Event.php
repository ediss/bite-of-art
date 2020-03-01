<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['gallerist_id'];

    // public function insertEvent($event_data) {
    //     Event::create($event_data);
    // }

    public function users()
    {
        return $this->belongsTo('App\User', 'gallerist_id', 'id');
    }

}
