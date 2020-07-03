<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = false;
    // protected $table ='albums';
    protected $primaryKey = 'album_id';
    // protected $fillable =['artist_id', 'album_name'];

public function artist()
{
    return $this->belongsTo('App\Artist', 'artist_id');
}
    
}
