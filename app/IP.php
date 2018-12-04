<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IP extends Model
{
    //
    protected $table = 'ip';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
