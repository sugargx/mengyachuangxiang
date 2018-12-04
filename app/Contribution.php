<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    //
    protected $table = 'contribution';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function member(){
        return $this->belongsTo('\App\Member','member_id','id');
    }
}
