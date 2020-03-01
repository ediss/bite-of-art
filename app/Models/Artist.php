<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artists';
    protected $fillable = ['artist_name','event_id'];
    
    protected $primaryKey = 'event_id';



    public function event() {
        return $this->belongsTo('Event', 'id', 'event_id');

    }
}
