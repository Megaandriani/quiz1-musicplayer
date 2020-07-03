<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Played extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'play_id';

    public function track()
    {
        return $this->belongsTo('App\Track', 'track_id');
    }
}
