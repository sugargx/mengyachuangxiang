<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $table = "team";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function members(){
        return $this->hasMany("App\Member","team_id","id");
    }
}
