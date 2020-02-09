<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'parent_id',
        'v_name' ,
        'v_title',
        'v_desc' ,
        'v_metatitle',
        'v_metadescription',
        'v_metakeyword',
        'i_order',
        'i_status'
    ];

    public function getPageStatusAttribute()
    {   if($this->i_status == 0){
            return "<span class='badge badge-warning'>Inactive</span>";
        }else{
            return "<span class='badge badge-success'>Active</span>";
        }
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

}
