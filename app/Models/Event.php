<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    // public function insertEvent($event_data) {
    //     Event::create($event_data);
    // }

    public function user() {
        return $this->belongsTo('App\User', 'gallerist_id');
    }

    public function artists() {
        return $this->hasMany('App\Models\Artist', 'id', 'event_id');
    }

    public function artworks() {
        return $this->hasMany('App\Models\Artwork', 'event_id');
    }

}
