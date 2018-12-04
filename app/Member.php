<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $table = "member";
    protected $primaryKey = "id";
    public $timestamps = false;
    //获取成员的所在团队
    public function team(){
        return $this->belongsTo("App\Team","team_id","id")->withDefault();
    }
    //获取成员的博客
    public function blogs(){
        return $this->hasMany('App\Blog',"member_id","id");
    }
    //获取成员的日志
    public function journals(){
        return $this->hasMany('App\Journal','member_id','id');
    }
    //获取成员的职务
    public function job(){
        return $this->belongsTo('App\Job','job_id','id');
    }
    //获取一个成员的所有项目
    public function projects(){
        return $this->belongsToMany('App\Project','member_project','member_id','project_id');
    }
    //获取一个成员的所有技能以及评估
    public function skills(){
        return $this->hasMany('App\Skill','member_id','id');
    }
}
