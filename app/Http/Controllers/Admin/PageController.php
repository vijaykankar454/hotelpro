<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddPageRequest;
use App\Http\Requests\EditPageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Page;

class PageController extends Controller
{
    public function index($id =0)
    {
        $pagename ='';
       if($id == 0){
            $Pages = Page::orderBy('created_at','desc')->where('parent_id',$id)->get();
       }else{
            $PagesData  = Page::findOrFail($id);
            $Pages      = $PagesData->children()->get();
            $pagename   = $PagesData->v_name;
       }
        return view('admin.pages.index', compact('Pages','pagename','id'));
       
    }
    public function addPage($id = 0)
    {
        return view('admin.pages.add', compact('id'));
    }
    public function addPageSubmit(AddPageRequest $request)
    {
        
        if($request->isMethod('Post')){
           
            $data = [
                'parent_id'     =>   $request->parent_id,
                'v_name'        =>  $request->v_name,
                'v_title'       =>  $request->v_title,
                'v_desc'        =>  $request->v_desc,
                'v_metatitle'   =>  $request->v_metatitle,
                'v_metadescription'=>   $request->v_metadescription,
                'v_metakeyword' =>  $request->v_metakeyword,
                'i_order'       =>  $request->i_order
            ];
    
            Page::create($data);
            $parentId = ($request->parent_id)?$request->parent_id :'';
            return redirect("admin/pages/".$parentId)->with('succmessage', 'You have Added Record Successfully.');   
        }
        return view('admin.pages.add');
    }
    public function editPage($id)
    {
        $Pages = Page::findOrFail($id);
        return view('admin.pages.edit',compact('Pages'));
    }

    public function updatePage(EditPageRequest $request,$id)
    {
       $PagesData   = Page::findOrFail($id);
       $parentId    = ($PagesData->parent_id)? $PagesData->parent_id :'';
       $Pages       = $PagesData->update($request->all());
       return redirect("admin/pages/".$parentId)->with('succmessage', 'Record Updated Successfully.');   
    }    
    public function delete($id){
        $PagesData      = Page::findOrFail($id);
        $parentId       = ($PagesData->parent_id)? $PagesData->parent_id :'';
        $PagesData->children()->delete();
        $PagesData->delete();
        return redirect("admin/pages/".$parentId)->with('succmessage', 'Record Deleted Successfully.');   
    }
    public function updateStatus($id,$status){
        $input['i_status'] = $status;
        $PagesData      =   Page::findOrFail($id);
        $parentId       = ($PagesData->parent_id)? $PagesData->parent_id :'';
        $PagesData->update($input);
        return redirect("admin/pages/".$parentId)->with('succmessage', 'Record Status Update Successfully.');   
    }
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
            Page::whereIn('id', $data['pageid'])->delete();
            Page::whereIn('parent_id', $data['pageid'])->delete();
            $parentId       = ($data['parent_id'])? $data['parent_id'] :'';
            return redirect("admin/pages/".$parentId)->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
