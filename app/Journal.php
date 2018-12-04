<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    //
    protected $table = 'journal';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
