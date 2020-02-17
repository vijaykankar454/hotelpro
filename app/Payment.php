<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function audioFiles()
    {
        return $this->hasManyThrough( 'App\Destination','App\Package');
    }
}
