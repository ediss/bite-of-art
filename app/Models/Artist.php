<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artists';
    protected $fillable = ['artist_name','event_id'];
    
    // protected $primaryKey = 'event_id';



    public function event() {
        return $this->belongsTo('App\Models\Event', 'event_id', 'id');

    }

    public function user() {
        return $this->belongsTo('App\User', 'gallerist_id', 'id');
    }

    public function artworks() {
        return $this->hasMany('App\Models\Artwork','artist_id', 'id');

    }
}
