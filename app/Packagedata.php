<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packagedata extends Model
{
    protected $guarded= ['id'];
    protected $table = 'package_data';
    public $timestamps = false;

    protected $uploads = '/image/thumbnail/';
    protected $uploadsbanner = '/image/upload/';

    public function getPhotos($type,$pid)
    {
        return self::where('package_type',$type)->where('package_id',$pid)->select('v_photo_video','id')->get();
    }
    public function getPhotoAttribute()
     {  
          if($this->v_photo_video !=''){
             return $this->uploads . $this->v_photo_video;
         }
     }
}
