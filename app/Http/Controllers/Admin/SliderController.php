<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddSliderRequest;
use App\Http\Requests\EditSliderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Slider;
use Image;

class SliderController extends Controller
{
    public function index()
    {
      
        $sliderData  = Slider::orderBy('id','DESC')->get();
        return view('admin.slider.index', compact('sliderData'));
       
    }
    public function addSlider()
    {
        return view('admin.slider.add', compact('id'));
    }
    public function addSliderSubmit(AddSliderRequest $request)
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
                $thumbnailImage->resize(260,200);
                $thumbnailImage->save($thumbnailPath.$imagetime.$originalImage->getClientOriginalName());
                $data['v_photo'] = $imagetime.$originalImage->getClientOriginalName();
            }
            Slider::create($data);
            return redirect("admin/slider/")->with('succmessage', 'You have Added Record Successfully.');   
        }
        return view('admin.slider.add');
    }
    public function editSlider($id)
    {
        $Slider = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('Slider'));
    }

    public function updateSlider(EditSliderRequest $request,$id)
    {
        $SliderData   = Slider::findOrFail($id);
        $data = $request->all();
        $imagetime      = time();
        $thumbnailPath  = public_path().'/image/thumbnail/';
        $originalPath   = public_path().'/image/upload/';
        $data['v_photo'] = $SliderData->v_photo;
      
       if($request->hasFile('v_photo')){
            if(\File::exists(public_path('image/thumbnail/'.$SliderData->v_photo))){
                \File::delete(public_path('image/thumbnail/'.$SliderData->v_photo));
                \File::delete(public_path('image/upload/'.$SliderData->v_photo));
            }
            $originalImage= $request->file('v_photo');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailImage->save($originalPath.$imagetime.$originalImage->getClientOriginalName());
            $thumbnailImage->resize(260,260);
            $thumbnailImage->save($thumbnailPath.$imagetime.$originalImage->getClientOriginalName());
            $data['v_photo'] = $imagetime.$originalImage->getClientOriginalName();
        }

       $Slider     = $SliderData->update($data);
       return redirect("admin/slider/")->with('succmessage', 'Record Updated Successfully.');   
    }    
    public function delete($id){
        $PagesData= Slider::findOrFail($id);
        $PagesData->delete();
        return redirect("admin/slider")->with('succmessage', 'Record Deleted Successfully.');   
    }
    public function updateStatus($id,$status){
        $input['status'] = $status;
        Slider::findOrFail($id)->update($input);
        return redirect("admin/slider")->with('succmessage', 'Record Status Update Successfully.');   
    }
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
            Slider::whereIn('id', $data['sliderid'])->delete();
            return redirect("admin/slider")->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
