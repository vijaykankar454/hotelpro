<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddTeamRequest;
use App\Http\Requests\EditTeamRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Team;
use Image;

class TeamController extends Controller
{
    public function index()
    {
      
        $teamData  = Team::orderBy('id','DESC')->get();
        return view('admin.teams.index', compact('teamData'));
       
    }
    public function addTeam()
    {
        return view('admin.teams.add', compact('id'));
    }
    public function addTeamSubmit(AddTeamRequest $request)
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
                $thumbnailImage->resize(260,260);
                $thumbnailImage->save($thumbnailPath.$imagetime.$originalImage->getClientOriginalName());
                $data['v_photo'] = $imagetime.$originalImage->getClientOriginalName();
            }
            if($request->hasFile('v_banner')){
               
                $originalImagebanner = $request->file('v_banner');
                $thumbnailImagebanner = Image::make($originalImagebanner);
                $thumbnailImagebanner->save($originalPath.$imagetime.$originalImagebanner->getClientOriginalName());
                $data['v_banner'] = $imagetime.$originalImagebanner->getClientOriginalName();
            }
           
            Team::create($data);
            return redirect("admin/teams/")->with('succmessage', 'You have Added Record Successfully.');   
        }
        return view('admin.teams.add');
    }
    public function editTeam($id)
    {
        $Teams = Team::findOrFail($id);
        return view('admin.teams.edit',compact('Teams'));
    }

    public function updateTeam(EditTeamRequest $request,$id)
    {
        $TeamsData   = Team::findOrFail($id);
        $data = $request->all();
        $imagetime      = time();
        $thumbnailPath  = public_path().'/image/thumbnail/';
        $originalPath   = public_path().'/image/upload/';
        $data['v_photo'] = $TeamsData->v_photo;
        $data['v_banner'] = $TeamsData->v_banner;

       if($request->hasFile('v_photo')){
            if(\File::exists(public_path('image/thumbnail/'.$TeamsData->v_photo))){
                \File::delete(public_path('image/thumbnail/'.$TeamsData->v_photo));
                \File::delete(public_path('image/upload/'.$TeamsData->v_photo));
            }
            $originalImage= $request->file('v_photo');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailImage->save($originalPath.$imagetime.$originalImage->getClientOriginalName());
            $thumbnailImage->resize(260,260);
            $thumbnailImage->save($thumbnailPath.$imagetime.$originalImage->getClientOriginalName());
            $data['v_photo'] = $imagetime.$originalImage->getClientOriginalName();
        }

        if($request->hasFile('v_banner')){
            if(\File::exists(public_path('image/upload/'.$TeamsData->v_banner))){
                \File::delete(public_path('image/upload/'.$TeamsData->v_banner));
            }
            $originalImagebanner = $request->file('v_banner');
            $thumbnailImagebanner = Image::make($originalImagebanner);
            $thumbnailImagebanner->save($originalPath.$imagetime.$originalImagebanner->getClientOriginalName());
            $data['v_banner'] = $imagetime.$originalImagebanner->getClientOriginalName();
        } 

       $Teams      = $TeamsData->update($data);
       return redirect("admin/teams/")->with('succmessage', 'Record Updated Successfully.');   
    }    
    public function delete($id){
        $PagesData= Team::findOrFail($id);
        $PagesData->delete();
        return redirect("admin/teams")->with('succmessage', 'Record Deleted Successfully.');   
    }
    public function updateStatus($id,$status){
        $input['i_status'] = $status;
        Team::findOrFail($id)->update($input);
        return redirect("admin/teams")->with('succmessage', 'Record Status Update Successfully.');   
    }
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
            Team::whereIn('id', $data['teamid'])->delete();
            return redirect("admin/teams")->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
