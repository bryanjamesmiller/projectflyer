<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //If you don't want the same database table name as the
    //default name (the plural version of the Model name), use the below to override the
    //default.  So here, the default would have been "photos".
    protected $table = 'flyer_photos';

    // Mass assignable fields
    protected $fillable = ['photo'];

    // One-to-many relationship,
    // One flyer has many photos
    public function flyer(){
        return $this->belongsTo('App\Flyer');
    }
}
