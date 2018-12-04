<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class New_comment extends Model
{
    //
    protected $table = "new_comment";
    protected $primaryKey = "id";
    public $timestamps = false;
}

