<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddPageRequest;
use App\Http\Requests\EditPageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Page;
Use App\User;

class TravellerController extends Controller
{
    public function index()
    {
     
        $userData  = User::orderBy('id','DESC')->get();
        return view('admin.traveller.index', compact('userData'));
       
    }
   
    public function delete($id){
        $PagesData= User::findOrFail($id)->delete();
        return redirect("admin/traveller")->with('succmessage', 'Record Deleted Successfully.');   
    }
    public function updateStatus($id,$status){
        $input['status'] = $status;
        User::findOrFail($id)->update($input);
        return redirect("admin/traveller")->with('succmessage', 'Record Status Update Successfully.');   
    }
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
            User::whereIn('id', $data['traveller_id'])->delete();
            return redirect("admin/traveller")->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
