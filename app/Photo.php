<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    //If you don't want the same database table name as the
    //default name (the plural version of the Model name), use the below to override the
    //default.  So here, the default would have been "photos".
    protected $table = 'flyer_photos';

    // Mass assignable fields
    protected $fillable = ['path'];

    protected $baseDir = '/flyers/photos';

    public static function named($name)
    {
        return (new static)->saveAs($name);
    }

    protected function saveAs($name){
        $this->name = sprintf("%s-%s", time(), $name);
        $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);
    }

    public function move(UploadedFile $file){
        $file->move($this->baseDir, $this->name);
        $this->makeThumbnail();
        return $this;
    }

    protected function makeThumbnail(){
        //The below save method is in the "Image" class, it's not eloquent's save() method.
        Image::make($this->path)->fit(200)->save($this->thumbnail_path);
    }

    // One-to-many relationship,
    // One flyer has many photos
    public function flyer(){
        return $this->belongsTo('App\Flyer');
    }
}
