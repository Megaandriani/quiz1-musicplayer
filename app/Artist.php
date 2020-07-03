<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'artist_id';
    protected $fillable = ['artist_name'];
}
