<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Category;
use Image;

class CategoryController extends Controller
{
    public function index()
    {
      
        $CategoryData  = Category::orderBy('id','DESC')->get();
        return view('admin.category.index', compact('CategoryData'));
       
    }
    public function addCategory()
    {
        return view('admin.category.add');
    }
    public function addCategorySubmit(AddCategoryRequest $request)
    {
        
        if($request->isMethod('Post')){
           
         
            $data = $request->all();
            $imagetime      = time();
            $originalPath   = public_path().'/image/upload/';
            if($request->hasFile('v_banner')){
               
                $originalImagebanner = $request->file('v_banner');
                $thumbnailImagebanner = Image::make($originalImagebanner);
                $thumbnailImagebanner->save($originalPath.$imagetime.$originalImagebanner->getClientOriginalName());
                $data['v_banner'] = $imagetime.$originalImagebanner->getClientOriginalName();
            }
           
            Category::create($data);
            return redirect("admin/category/")->with('succmessage', 'You have Added Record Successfully.');   
        }
        return view('admin.category.add');
    }
    public function editCategory($id)
    {
        $Category = Category::findOrFail($id);
        return view('admin.category.edit',compact('Category'));
    }

    public function updateCategory(EditCategoryRequest $request,$id)
    {
        $CategoryData   = Category::findOrFail($id);
        $data = $request->all();
        $imagetime      = time();
      
        $originalPath   = public_path().'/image/upload/';
        $data['v_banner'] = $CategoryData->v_banner;

        if($request->hasFile('v_banner')){
            if(\File::exists(public_path('image/upload/'.$CategoryData->v_banner))){
                \File::delete(public_path('image/upload/'.$CategoryData->v_banner));
            }
            $originalImagebanner = $request->file('v_banner');
            $thumbnailImagebanner = Image::make($originalImagebanner);
            $thumbnailImagebanner->save($originalPath.$imagetime.$originalImagebanner->getClientOriginalName());
            $data['v_banner'] = $imagetime.$originalImagebanner->getClientOriginalName();
        } 

       $Category     = $CategoryData->update($data);
       return redirect("admin/category/")->with('succmessage', 'Record Updated Successfully.');   
    }    
    public function delete($id){
        $PagesData= Category::findOrFail($id);
        $PagesData->delete();
        return redirect("admin/category")->with('succmessage', 'Record Deleted Successfully.');   
    }
    public function updateStatus($id,$status){
        $input['i_status'] = $status;
        Category::findOrFail($id)->update($input);
        return redirect("admin/category")->with('succmessage', 'Record Status Update Successfully.');   
    }
    public function deleteAll(Request $request){
		if($request->isMethod('Post')){
			$data = $request->all();
            Category::whereIn('id', $data['categoryid'])->delete();
            return redirect("admin/category")->with('succmessage', 'Selected Records Delete Successfully.');   
		}
    }
}
