<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packagedata extends Model
{
    protected $guarded= ['id'];
    protected $table = 'package_data';
    public $timestamps = false;

}
