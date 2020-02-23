<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use App\Package;
Use App\User;

class Payment extends Model
{
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function travellerData()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function getDestinationName()
    {
         return Package::leftJoin('destinations','destinations.id', '=', 'packages.destination_id')->where('packages.id',$this->package_id)->first();
      
    }
    
}
