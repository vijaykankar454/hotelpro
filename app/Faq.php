<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $guarded= ['id'];
    
    public function getFaqStatusAttribute()
    {   if($this->i_status == 0){
            return "<span class='badge badge-warning'>Inactive</span>";
        }else{
            return "<span class='badge badge-success'>Active</span>";
        }
    }
}
