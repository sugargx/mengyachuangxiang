<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogcommit extends Model
{
    //
    protected $table = 'blogcommit';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function  member(){
       return  $this->belongsTo('App\Member','member_id','id');
    }

}
