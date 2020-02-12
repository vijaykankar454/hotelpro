<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddTestimonialRequest;
use App\Http\Requests\EditTestimonialRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Testimonial;
use Image;

class TestimonialController extends Controller
{
    public function index()
    {
      
        $TestimonialData  = Testimonial::orderBy('id','DESC')->get();
        return view('admin.testimonial.index', compact('TestimonialData'));
       
    }
    public function addTestimonial()
    {
        return view('admin.testimonial.add');
    }
    public function addTestimonialSubmit(AddTestimonialRequest $request)
    {
        
        if($request->isMethod('Post')){
            $data = $request->all();
            $imagetime      = time();
            $thumbnailPath  = public_path().'/image/thumbnail/';
            $originalPath   = public_path().'/image/upload/';
            if($request->hasFile('v_photo')){
               
                $originalImage= $request->file('v_photo');
                $thumbnailImage = Image::make($originalImage);
                $thumbnailImage->save($originalPath.$imagetime.$originalImage->getClientOriginalName());
                $thumbnailImage->resize(230,260);
                $thumbnailImage->save($thumbnailPath.$imagetime.$originalImage->getClientOriginalName());
                $data['v_photo'] = $imagetime.$originalImage->getClientOriginalName();
            }
            Testimonial::create($data);
            return redirect("admin/testimonial/")->with('succmessage', 'You have Added Record Successfully.');   
        }
        return view('admin.testimonial.add');
    }
    public function editTestimonial($id)
    {
        $Testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit',compact('Testimonial'));
    }

    public function updateTestimonial(EditTestimonialRequest $request,$id)
    {
        $TestimonialData   = Testimonial::findOrFail($id);
        $data = $request->all();
        $imagetime      = time();
        $thumbnailPath  = public_path().'/image/thumbnail/';
        $originalPath   = public_path().'/image/upload/';
        $data['v_photo'] = $TestimonialData->v_photo;
      
       if($request->hasFile('v_photo')){
            if(\File::exists(public_path('image/thumbnail/'.$TestimonialData->v_photo))){
                \File::delete(public_path('image/thumbnail/'.$TestimonialData->v_photo));
                \File::delete(public_path('image/upload/'.$TestimonialData->v_photo));
            }
            $originalImage= $request->file('v_photo');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailImage->save($originalPath.$imagetime.$originalImage->getClientOriginalName());
            $thumbnailImage->resize(230,260);
            $thumbnailImage->save($thumbnailPath.$imagetime.$originalImage->getClientOriginalName());
            $data['v_photo'] = $imagetime.$originalImage->getClientOriginalName();
        }

       $Testimonial     = $TestimonialData->update($data);
       return redirect("admin/testimonial/")->with('succmessage', 'Record Updated Successfully.');   
    }    
    public function delete($id){
        $PagesData= Testimonial::findOrFail($id);
        $PagesData->delete();
        return redirect("admin/testimonial")->with('succmessage', 'Record Deleted Successfully.');   
    }
    public function updateStatus($id,$status){
        $input['i_status'] = $status;
        Testimonial::findOrFail($id)->update($input);
        return redirect("admin/testimonial")->with('succmessage', 'Record Status Update Successfully.');   
    }
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
            Testimonial::whereIn('id', $data['testimonialid'])->delete();
            return redirect("admin/testimonial")->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
