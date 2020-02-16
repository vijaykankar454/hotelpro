<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
   protected $guarded= ['id'];

   protected $uploads = '/image/thumbnail/';
   protected $uploadsbanner = '/image/upload/';
   public function getPhotoAttribute()
    {  
         if($this->v_photo !=''){
            return $this->uploads . $this->v_photo;
        }
    }

    public function getBannerAttribute()
    {  
         if($this->v_banner !=''){
            return $this->uploadsbanner . $this->v_banner;
        }
    }

   
}
