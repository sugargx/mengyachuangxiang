<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = "project";
    protected $primaryKey = "id";
    public $timestamps = false;
    public function members(){
        return $this->belongsToMany('App\Member','member_project','project_id','member_id');
    }
}
