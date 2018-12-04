<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table = 'blog';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function member(){
        return $this->belongsTo('App\Member','member_id','id');
    }
    public function ip(){
        return $this->hasMany('App\IP','blog_id','id' );
    }
    public function blogcommits(){
        return $this->hasMany('App\Blogcommit','blog_id','id' );
    }
}
