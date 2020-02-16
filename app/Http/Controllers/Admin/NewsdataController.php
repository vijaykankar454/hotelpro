<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddNewsRequest;
use App\Http\Requests\EditNewsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Category;
Use App\News;
use Image;

class NewsdataController extends Controller
{
    public function index()
    {
       
        $newsData  = News::orderBy('id','DESC')->get();
        return view('admin.news.index', compact('newsData'));
       
    }
   public function addNews()
    {  
        $categories = ['' => 'Select category'] + Category::where('i_status',1)->pluck('v_cat_name','id')->all();
        return view('admin.news.add',compact('categories'));
    }
    public function addNewsSubmit(AddNewsRequest $request)
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
           
            News::create($data);
            return redirect("admin/news/")->with('succmessage', 'You have Added Record Successfully.');   
        }
        return view('admin.news.add');
    }
    public function editNews($id)
    {   
        $categories = ['' => 'Select category'] + Category::where('i_status',1)->pluck('v_cat_name','id')->all();
        $News = News::findOrFail($id);
        return view('admin.news.edit',compact('News','categories'));
    }

    public function updateNews(EditNewsRequest $request,$id)
    {
        $NewsData   = News::findOrFail($id);
        $data = $request->all();
        $imagetime      = time();
        $thumbnailPath  = public_path().'/image/thumbnail/';
        $originalPath   = public_path().'/image/upload/';
        $data['v_photo'] = $NewsData->v_photo;
        $data['v_banner'] = $NewsData->v_banner;

       if($request->hasFile('v_photo')){
            if(\File::exists(public_path('image/thumbnail/'.$NewsData->v_photo))){
                \File::delete(public_path('image/thumbnail/'.$NewsData->v_photo));
                \File::delete(public_path('image/upload/'.$NewsData->v_photo));
            }
            $originalImage= $request->file('v_photo');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailImage->save($originalPath.$imagetime.$originalImage->getClientOriginalName());
            $thumbnailImage->resize(100,67);
            $thumbnailImage->save($thumbnailPath.$imagetime.$originalImage->getClientOriginalName());
            $data['v_photo'] = $imagetime.$originalImage->getClientOriginalName();
        }

        if($request->hasFile('v_banner')){
            if(\File::exists(public_path('image/upload/'.$NewsData->v_banner))){
                \File::delete(public_path('image/upload/'.$NewsData->v_banner));
            }
            $originalImagebanner = $request->file('v_banner');
            $thumbnailImagebanner = Image::make($originalImagebanner);
            $thumbnailImagebanner->save($originalPath.$imagetime.$originalImagebanner->getClientOriginalName());
            $data['v_banner'] = $imagetime.$originalImagebanner->getClientOriginalName();
        } 

       $News     = $NewsData->update($data);
       return redirect("admin/news/")->with('succmessage', 'Record Updated Successfully.');   
    }    
    public function delete($id){
        $PagesData= News::findOrFail($id);
        $PagesData->delete();
        return redirect("admin/news")->with('succmessage', 'Record Deleted Successfully.');   
    }
    public function updateStatus($id,$status){
        $input['i_status'] = $status;
        News::findOrFail($id)->update($input);
        return redirect("admin/news")->with('succmessage', 'Record Status Update Successfully.');   
    }
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
            News::whereIn('id', $data['newsid'])->delete();
            return redirect("admin/news")->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
