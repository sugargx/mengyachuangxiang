<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = "news";
    protected $primaryKey = "id";
    public $timestamps = false;
    public function member(){
        return $this->belongsTo("App\Member","member_id",'id');
    }
}
