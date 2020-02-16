<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddPackageRequest;
use App\Http\Requests\EditPackageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Packagedata;
Use App\Destination;
Use App\Package;
use Image;

class PackageController extends Controller
{
    public function index()
    {
       
        $packageData  = Package::orderBy('id','DESC')->get();
        return view('admin.package.index', compact('packageData'));
       
    }
   public function addPackage()
    {  
       $categories = ['' => 'Select category'] + Destination::where('i_status',1)->pluck('v_name','id')->all();
        return view('admin.package.add', compact('categories'));
    }
    public function addPackageSubmit(AddPackageRequest $request)
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
                $thumbnailImage->resize(100,67);
                $thumbnailImage->save($thumbnailPath.$imagetime.$originalImage->getClientOriginalName());
                $data['v_photo'] = $imagetime.$originalImage->getClientOriginalName();
            }
            if($request->hasFile('v_banner')){
               
                $originalImagebanner = $request->file('v_banner');
                $thumbnailImagebanner = Image::make($originalImagebanner);
                $thumbnailImagebanner->save($originalPath.$imagetime.$originalImagebanner->getClientOriginalName());
                $data['v_banner'] = $imagetime.$originalImagebanner->getClientOriginalName();
            }
           
            $package = Package::create($data);
        

            if($files     =       $request->file('photos')) {
           
                foreach($files as $file) {
                    $upload = array();
                    $thumbnailfile = Image::make($file);
                    if($thumbnailfile->save($originalPath.$imagetime.$file->getClientOriginalName())){
                        $thumbnailfile->resize(150,84);
                        $thumbnailfile->save($thumbnailPath.$imagetime.$file->getClientOriginalName());
                        $upload['v_photo_video']    = $imagetime.$file->getClientOriginalName();
                        $upload['package_id']       = $package->id;
                        $upload['package_type']     = 'photo';
                        Packagedata::create($upload);
                    }
                }
            }
            if($videopath     =       $request->videos) {
           
                foreach($videopath as $video) {
                    $uploadvideo = array();
                
                    $uploadvideo['v_photo_video']    = $video;
                    $uploadvideo['package_id']       = $package->id;
                    $uploadvideo['package_type']     = 'video';
                    Packagedata::create($uploadvideo);
                    
                }
            }
        
            return redirect("admin/package")->with('succmessage', 'You have Added Record Successfully.');   
        }
        return view('admin.package.add');
    }
    public function editPackage($id)
    {   
        $categories = ['' => 'Select category'] + Destination::where('i_status',1)->pluck('v_name','id')->all();
        $Package = Package::findOrFail($id);
        return view('admin.package.edit',compact('Package','categories'));
    }

    public function updatePackage(EditPackageRequest $request,$id)
    {
        $PackageData   = Package::findOrFail($id);
        $data = $request->all();
        $imagetime      = time();
        $thumbnailPath  = public_path().'/image/thumbnail/';
        $originalPath   = public_path().'/image/upload/';
        $data['v_photo'] = $PackageData->v_photo;
        $data['v_banner'] = $PackageData->v_banner;

       if($request->hasFile('v_photo')){
            if(\File::exists(public_path('image/thumbnail/'.$PackageData->v_photo))){
                \File::delete(public_path('image/thumbnail/'.$PackageData->v_photo));
                \File::delete(public_path('image/upload/'.$PackageData->v_photo));
            }
            $originalImage= $request->file('v_photo');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailImage->save($originalPath.$imagetime.$originalImage->getClientOriginalName());
            $thumbnailImage->resize(100,67);
            $thumbnailImage->save($thumbnailPath.$imagetime.$originalImage->getClientOriginalName());
            $data['v_photo'] = $imagetime.$originalImage->getClientOriginalName();
        }

        if($request->hasFile('v_banner')){
            if(\File::exists(public_path('image/upload/'.$PackageData->v_banner))){
                \File::delete(public_path('image/upload/'.$PackageData->v_banner));
            }
            $originalImagebanner = $request->file('v_banner');
            $thumbnailImagebanner = Image::make($originalImagebanner);
            $thumbnailImagebanner->save($originalPath.$imagetime.$originalImagebanner->getClientOriginalName());
            $data['v_banner'] = $imagetime.$originalImagebanner->getClientOriginalName();
        } 

       $Package     = $PackageData->update($data);
        if($files     =       $request->file('photos')) {
            
        foreach($files as $file) {
            $upload = array();
            $thumbnailfile = Image::make($file);
            if($thumbnailfile->save($originalPath.$imagetime.$file->getClientOriginalName())){
                $thumbnailfile->resize(150,84);
                $thumbnailfile->save($thumbnailPath.$imagetime.$file->getClientOriginalName());
                $upload['v_photo_video']    = $imagetime.$file->getClientOriginalName();
                $upload['package_id']       = $PackageData->id;
                $upload['package_type']     = 'photo';
                Packagedata::create($upload);
            }
        }
        }
        if($videopath     =       $request->videos) {

        foreach($videopath as $video) {
            $uploadvideo = array();

            $uploadvideo['v_photo_video']    = $video;
            $uploadvideo['package_id']       = $PackageData->id;
            $uploadvideo['package_type']     = 'video';
            Packagedata::create($uploadvideo);
            
        }
        }

       return redirect("admin/package/")->with('succmessage', 'Record Updated Successfully.');   
    }    
    public function delete($id){
        $PagesData= Package::findOrFail($id);
        $PagesData->delete();
        return redirect("admin/package")->with('succmessage', 'Record Deleted Successfully.');   
    }
    public function updateStatus($id,$status){
        $input['i_status'] = $status;
        Package::findOrFail($id)->update($input);
        return redirect("admin/package")->with('succmessage', 'Record Status Update Successfully.');   
    }
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
            Package::whereIn('id', $data['packageid'])->delete();
            return redirect("admin/package")->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
