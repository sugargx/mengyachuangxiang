<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageType extends Model
{
    //
    protected $table = "imagetype";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function images(){
        return $this->hasMany('App\Image','type_id','id');
    }
}
