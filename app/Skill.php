<?php

namespace App;
use App\Member;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $primaryKey = "id";
    protected $table = "skill";
    public $timestamps = false;
    public  function  members(){
        return $this->belongsTo('App\Member','member_id','id');
    }
}
