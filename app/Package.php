<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded= ['id','videos','photos'];

    protected $uploads = '/image/thumbnail/';
    protected $uploadsbanner = '/image/upload/';
    public function getPhotoAttribute()
     {  
          if($this->v_photo !=''){
             return $this->uploads . $this->v_photo;
         }
     }

     public function getPackageStatusAttribute()
     {   if($this->i_status == 0){
             return "<span class='badge badge-warning'>Inactive</span>";
         }else{
             return "<span class='badge badge-success'>Active</span>";
         }
     } 
     public function getBannerAttribute()
     {  
          if($this->v_banner !=''){
             return $this->uploadsbanner . $this->v_banner;
         }
     }
     public function destination()
     {
         return $this->belongsTo(Destination::class);
     }
    
    

}
