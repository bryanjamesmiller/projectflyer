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
     * and used in the controller, for instance).
     * Scopes should always return a query builder instance.
     * https://laravel.com/docs/5.2/eloquent#local-scopes
     *
     * @param $zip
     * @param $street
     * @param $query
     * @return mixed
     */
    public function scopeLocatedAt($query, $zip, $street){
        $street = str_replace('-', ' ', $street);
        return $query->where(compact('zip', 'street'));
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

    // One-to-many relationship,
    // there are many photos for one flyer.
    // You also need the "belongsTo" method
    // in the Photo Model.
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
