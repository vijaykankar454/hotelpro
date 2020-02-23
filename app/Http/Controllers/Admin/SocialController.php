<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\EditSocialRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Social;


class SocialController extends Controller
{
   
    public function index()
    {
        $field = Social::where('setting_status',1)->where('setting_type',1)->select('setting_name','setting_value')->get();
      
        return view('admin.social.add',compact('field'));
    }
    public function addSocialSubmit(EditSocialRequest $request)
    {
        
        if($request->isMethod('Post')){
            $data = $request->all();
         
            foreach($data['v_data'] as $key=>$val){
                Social::where('setting_name',$key)->update(array('setting_value'=>$val));
            }
       
            return redirect("admin/social/")->with('succmessage', 'You have Updated Record Successfully.');   
        }
     
    }

}
