<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogkind extends Model
{
    //
    protected $table = 'blogkind';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function member(){
        return $this->hasMany('App\Blog','blog_id','id');
    }
}
