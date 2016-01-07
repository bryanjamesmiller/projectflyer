<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    // Fields that are allowed to be mass assignable
    protected $fillable = [
      'street',
        'city',
        'state',
        'country',
        'zip',
        'price',
        'description'
    ];

    // One-to-many relationship,
    // there are many photos for one flyer.
    // You also need the "belongsTo" method
    // in the Photo Model.
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
