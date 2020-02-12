<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $guarded= ['id'];
    protected $uploads = '/image/thumbnail/';

   public function getPhotoAttribute()
    {  
         if($this->v_photo !=''){
            return $this->uploads . $this->v_photo;
        }
    }
    public function getTestimonialStatusAttribute()
    {   if($this->i_status == 0){
            return "<span class='badge badge-warning'>Inactive</span>";
        }else{
            return "<span class='badge badge-success'>Active</span>";
        }
    }
}
