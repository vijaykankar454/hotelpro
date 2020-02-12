<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddClientRequest;
use App\Http\Requests\EditClientRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Client;
use Image;

class ClientController extends Controller
{
    public function index()
    {
      
        $ClientData  = Client::orderBy('id','DESC')->get();
        return view('admin.client.index', compact('ClientData'));
       
    }
    public function addClient()
    {
        return view('admin.client.add');
    }
    public function addClientSubmit(AddClientRequest $request)
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
            Client::create($data);
            return redirect("admin/client/")->with('succmessage', 'You have Added Record Successfully.');   
        }
        return view('admin.client.add');
    }
    public function editClient($id)
    {
        $Client = Client::findOrFail($id);
        return view('admin.client.edit',compact('Client'));
    }

    public function updateClient(EditClientRequest $request,$id)
    {
        $ClientData   = Client::findOrFail($id);
        $data = $request->all();
        $imagetime      =   time();
        $thumbnailPath  =   public_path().'/image/thumbnail/';
        $originalPath   =   public_path().'/image/upload/';
        $data['v_photo'] =  $ClientData->v_photo;
      
       if($request->hasFile('v_photo')){
            if(\File::exists(public_path('image/thumbnail/'.$ClientData->v_photo))){
                \File::delete(public_path('image/thumbnail/'.$ClientData->v_photo));
                \File::delete(public_path('image/upload/'.$ClientData->v_photo));
            }
            $originalImage= $request->file('v_photo');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailImage->save($originalPath.$imagetime.$originalImage->getClientOriginalName());
            $thumbnailImage->resize(70,50);
            $thumbnailImage->save($thumbnailPath.$imagetime.$originalImage->getClientOriginalName());
            $data['v_photo'] = $imagetime.$originalImage->getClientOriginalName();
        }

        $Client     = $ClientData->update($data);
       return redirect("admin/client/")->with('succmessage', 'Record Updated Successfully.');   
    }    
    public function delete($id){
        $PagesData= Client::findOrFail($id);
        $PagesData->delete();
        return redirect("admin/client")->with('succmessage', 'Record Deleted Successfully.');   
    }
    public function updateStatus($id,$status){
        $input['i_status'] = $status;
        Client::findOrFail($id)->update($input);
        return redirect("admin/client")->with('succmessage', 'Record Status Update Successfully.');   
    }
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
            Client::whereIn('id', $data['clientid'])->delete();
            return redirect("admin/client")->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
