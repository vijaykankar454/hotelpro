<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\AddServiceRequest;
use App\Http\Requests\EditServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Service;
use Image;

class ServiceController extends Controller
{
    public function index()
    {
      
        $ServiceData  = Service::orderBy('id','DESC')->get();
        return view('admin.service.index', compact('ServiceData'));
       
    }
    public function addService()
    {
        return view('admin.service.add');
    }
    public function addServiceSubmit(AddServiceRequest $request)
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
            if($request->hasFile('v_banner')){
               
                $originalImagebanner = $request->file('v_banner');
                $thumbnailImagebanner = Image::make($originalImagebanner);
                $thumbnailImagebanner->save($originalPath.$imagetime.$originalImagebanner->getClientOriginalName());
                $data['v_banner'] = $imagetime.$originalImagebanner->getClientOriginalName();
            }
           
            Service::create($data);
            return redirect("admin/service/")->with('succmessage', 'You have Added Record Successfully.');   
        }
        return view('admin.service.add');
    }
    public function editService($id)
    {
        $Service = Service::findOrFail($id);
        return view('admin.service.edit',compact('Service'));
    }

    public function updateService(EditServiceRequest $request,$id)
    {
        $ServiceData   = Service::findOrFail($id);
        $data = $request->all();
        $imagetime      = time();
        $thumbnailPath  = public_path().'/image/thumbnail/';
        $originalPath   = public_path().'/image/upload/';
        $data['v_photo'] = $ServiceData->v_photo;
        $data['v_banner'] = $ServiceData->v_banner;

       if($request->hasFile('v_photo')){
            if(\File::exists(public_path('image/thumbnail/'.$ServiceData->v_photo))){
                \File::delete(public_path('image/thumbnail/'.$ServiceData->v_photo));
                \File::delete(public_path('image/upload/'.$ServiceData->v_photo));
            }
            $originalImage= $request->file('v_photo');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailImage->save($originalPath.$imagetime.$originalImage->getClientOriginalName());
            $thumbnailImage->resize(260,260);
            $thumbnailImage->save($thumbnailPath.$imagetime.$originalImage->getClientOriginalName());
            $data['v_photo'] = $imagetime.$originalImage->getClientOriginalName();
        }

        if($request->hasFile('v_banner')){
            if(\File::exists(public_path('image/upload/'.$ServiceData->v_banner))){
                \File::delete(public_path('image/upload/'.$ServiceData->v_banner));
            }
            $originalImagebanner = $request->file('v_banner');
            $thumbnailImagebanner = Image::make($originalImagebanner);
            $thumbnailImagebanner->save($originalPath.$imagetime.$originalImagebanner->getClientOriginalName());
            $data['v_banner'] = $imagetime.$originalImagebanner->getClientOriginalName();
        } 

       $Service     = $ServiceData->update($data);
       return redirect("admin/service/")->with('succmessage', 'Record Updated Successfully.');   
    }    
    public function delete($id){
        $PagesData= Service::findOrFail($id);
        $PagesData->delete();
        return redirect("admin/service")->with('succmessage', 'Record Deleted Successfully.');   
    }
    public function updateStatus($id,$status){
        $input['i_status'] = $status;
        Service::findOrFail($id)->update($input);
        return redirect("admin/service")->with('succmessage', 'Record Status Update Successfully.');   
    }
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
            Service::whereIn('id', $data['serviceid'])->delete();
            return redirect("admin/service")->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
