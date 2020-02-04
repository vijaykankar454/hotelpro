<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddPageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Page;

class PageController extends Controller
{
    public function index()
    {
        ///Auth::guard('admin')->user();
        $Pages = Page::all();
        return view('admin.pages.index', compact('Pages'));
       
    }
    public function addPage()
    {
        return view('admin.pages.add');
    }
    public function addPageSubmit(AddPageRequest $request)
    {
        
        if($request->isMethod('Post')){
           
            $data = [
                'parent_id'     =>  0,
                'v_name'        =>  $request->v_name,
                'v_title'       =>  $request->v_title,
                'v_desc'        =>  $request->v_desc,
                'v_metatitle'   =>  $request->v_metatitle,
                'v_metadescription'=>   $request->v_metadescription,
                'v_metakeyword' =>  $request->v_metakeyword,
                'i_order'       =>  $request->i_order
            ];
    
            Page::create($data);
            return redirect("admin/pages")->with('succmessage', 'You have Added Record Successfully.');   
        }
        return view('admin.pages.add');
    }

    public function delete($id){
        Page::findOrFail($id)->delete();
        return redirect("admin/pages")->with('succmessage', 'Record Deleted Successfully.');   
    }
    public function updateStatus($id,$status){
        $input['i_status'] = $status;
        Page::findOrFail($id)->update($input);
        return redirect("admin/pages")->with('succmessage', 'Record Status Update Successfully.');   
    }
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
			Page::whereIn('id', $data['pageid'])->delete();
            return redirect("admin/pages")->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
