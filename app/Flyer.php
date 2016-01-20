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

    /**
     * Scope the query to a flyer at the given address.
     *
     * Defining A Query Scope:
     * Scopes allow you to easily re-use query logic in your models.
     * To define a scope, prefix a model method with scope (the method name
     * doesn't have to be declared in the model - it can just be assumed to exist
     * and used in the controller, for instance).  Jeffrey Way in the Laracasts "ProjectFlyer" series
     * did this two different ways, this is the second way.
     *
     * Scopes should always return a query builder instance.
     * https://laravel.com/docs/5.2/eloquent#local-scopes
     *
     * @param $zip
     * @param $street
     * @return mixed
     */
    public static function locatedAt($zip, $street){

        $street = str_replace('-', ' ', $street);
        return static::where(compact('zip'))->firstOrFail();
    }

    /**
     * https://laravel.com/docs/5.2/eloquent-mutators#accessors-and-mutators
     * This method could automatically format the results of $flyer->price.
     * It knows we're talking about a $flyer because this is the Flyer.php Model
     * file we are currently in.
     */
    public function getPriceAttribute($price)
    {
        return "$" . number_format($price);
    }

    /*
     * Jeffrey Way made this method just so that it would be easier to read
     * addPhoto() in the Controller than have the longer, less obviously clear code which this method
     * then does.  Also, because the Model is supposed to do queries, not the Controller, if you
     * want to do MVC the right way.
     */
    public function addPhoto(Photo $photo){
        return $this->photos()->save($photo);
    }

    // One-to-many relationship,
    // there are many photos for one flyer.
    // You also need the "belongsTo" method
    // in the Photo Model.
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

}
