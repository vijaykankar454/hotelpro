<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
   protected $guarded= ['id'];

   protected $uploads = '/image/thumbnail/';

   public function getPhotoAttribute()
    {  
         if($this->v_photo !=''){
            return $this->uploads . $this->v_photo;
        }
    }
}
