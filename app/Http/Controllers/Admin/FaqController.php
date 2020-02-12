<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddFaqRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Faq;
use Image;

class FaqController extends Controller
{
    public function index()
    {
      
        $FaqData  = Faq::orderBy('id','DESC')->get();
        return view('admin.faq.index', compact('FaqData'));
       
    }
    public function addFaq()
    {
        return view('admin.faq.add');
    }
    public function addFaqSubmit(AddFaqRequest $request)
    {
        
        if($request->isMethod('Post')){
            $data = $request->all();
            Faq::create($data);
            return redirect("admin/faq/")->with('succmessage', 'You have Added Record Successfully.');   
        }
        return view('admin.faq.add');
    }
    public function editFaq($id)
    {
        $Faq = Faq::findOrFail($id);
        return view('admin.faq.edit',compact('Faq'));
    }

    public function updateFaq(AddFaqRequest $request,$id)
    {
        $FaqData    = Faq::findOrFail($id);
        $data       = $request->all();
       $Faq     = $FaqData->update($data);
       return redirect("admin/faq/")->with('succmessage', 'Record Updated Successfully.');   
    }    
    public function delete($id){
        $PagesData= Faq::findOrFail($id);
        $PagesData->delete();
        return redirect("admin/faq")->with('succmessage', 'Record Deleted Successfully.');   
    }
    public function updateStatus($id,$status){
        $input['i_status'] = $status;
        Faq::findOrFail($id)->update($input);
        return redirect("admin/faq")->with('succmessage', 'Record Status Update Successfully.');   
    }
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
            Faq::whereIn('id', $data['faqid'])->delete();
            return redirect("admin/faq")->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
