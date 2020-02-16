<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category_lists';
    protected $guarded= ['id'];
    protected $uploadsbanner = '/image/upload/';

    public function getBannerAttribute()
    {  
         if($this->v_banner !=''){
            return $this->uploadsbanner . $this->v_banner;
        }
    }
    public function getCategoryStatusAttribute()
    {   if($this->i_status == 0){
            return "<span class='badge badge-warning'>Inactive</span>";
        }else{
            return "<span class='badge badge-success'>Active</span>";
        }
    }
}
