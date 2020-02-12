<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddDestinationRequest;
use App\Http\Requests\EditDestinationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Destination;
use Image;

class DestinationController extends Controller
{
    public function index()
    {
      
        $destinationData  = Destination::orderBy('id','DESC')->get();
        return view('admin.destination.index', compact('destinationData'));
       
    }
    public function addDestination()
    {
        return view('admin.destination.add');
    }
    public function addDestinationSubmit(AddDestinationRequest $request)
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
                $thumbnailImage->resize(260,230);
                $thumbnailImage->save($thumbnailPath.$imagetime.$originalImage->getClientOriginalName());
                $data['v_photo'] = $imagetime.$originalImage->getClientOriginalName();
            }
            if($request->hasFile('v_banner')){
                $originalImagebanner = $request->file('v_banner');
                $thumbnailImagebanner = Image::make($originalImagebanner);
                $thumbnailImagebanner->save($originalPath.$imagetime.$originalImagebanner->getClientOriginalName());
                $data['v_banner'] = $imagetime.$originalImagebanner->getClientOriginalName();
            }
           
            Destination::create($data);
            return redirect("admin/destination/")->with('succmessage', 'You have Added Record Successfully.');   
        }
        return view('admin.destination.add');
    }
    public function editDestination($id)
    {
        $Destination = Destination::findOrFail($id);
        return view('admin.destination.edit',compact('Destination'));
    }

    public function updateDestination(EditDestinationRequest $request,$id)
    {
        $DestinationData   = Destination::findOrFail($id);
        $data = $request->all();
        $imagetime          = time();
        $thumbnailPath      = public_path().'/image/thumbnail/';
        $originalPath       = public_path().'/image/upload/';
        $data['v_photo']    = $DestinationData->v_photo;
        $data['v_banner']   = $DestinationData->v_banner;

       if($request->hasFile('v_photo')){
            if(\File::exists(public_path('image/thumbnail/'.$DestinationData->v_photo))){
                \File::delete(public_path('image/thumbnail/'.$DestinationData->v_photo));
                \File::delete(public_path('image/upload/'.$DestinationData->v_photo));
            }
            $originalImage= $request->file('v_photo');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailImage->save($originalPath.$imagetime.$originalImage->getClientOriginalName());
            $thumbnailImage->resize(260,260);
            $thumbnailImage->save($thumbnailPath.$imagetime.$originalImage->getClientOriginalName());
            $data['v_photo'] = $imagetime.$originalImage->getClientOriginalName();
        }

        if($request->hasFile('v_banner')){
            if(\File::exists(public_path('image/upload/'.$DestinationData->v_banner))){
                \File::delete(public_path('image/upload/'.$DestinationData->v_banner));
            }
            $originalImagebanner = $request->file('v_banner');
            $thumbnailImagebanner = Image::make($originalImagebanner);
            $thumbnailImagebanner->save($originalPath.$imagetime.$originalImagebanner->getClientOriginalName());
            $data['v_banner'] = $imagetime.$originalImagebanner->getClientOriginalName();
        } 

       $Destination      = $DestinationData->update($data);
       return redirect("admin/destination/")->with('succmessage', 'Record Updated Successfully.');   
    }    
    public function delete($id){
        $PagesData= Destination::findOrFail($id);
        $PagesData->delete();
        return redirect("admin/destination")->with('succmessage', 'Record Deleted Successfully.');   
    }
    public function updateStatus($id,$status){
        $input['i_status'] = $status;
        Destination::findOrFail($id)->update($input);
        return redirect("admin/destination")->with('succmessage', 'Record Status Update Successfully.');   
    }
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
            Destination::whereIn('id', $data['destinationid'])->delete();
            return redirect("admin/destination")->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
