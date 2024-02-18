<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DataHistory;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    function category_add(){
        $categories = Category::all();
        return view('admin.category.category',[
            'categories'=>$categories,
        ]);
    }

    function category_store(Request $request){
        $request->validate([
            'category_name'=>'required|unique:categories',
            'image'=>'required',
        ]);
        $photo = $request->image;
        $extension = $photo->extension();
        $file_name = Str::lower(str_replace(' ','-',$request->category_name)) .'-'.uniqid().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/category/'.$file_name));

        Category::insert([
            'category_name'=>$request->category_name,
            'image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);

        DataHistory::insert([
            'user_id'=>Auth::id(),
            'model'=>'Category',
            'data'=>$request->category_name,
            'action'=>'Category inserterd',
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Category Added Successfull');
    }

    function category_edit($id){
        $category_info = Category::find($id);
        return view('admin.category.category_edit',[
            'category_info'=>$category_info,
        ]);
    }

    function category_update(Request $request, $id){
        if ($request->image == null) {
            $request->validate([
                'category_name'=>'required|unique:categories',
            ]);
            Category::find($id)->update([
                'category_name'=>$request->category_name,
                'updated_at'=>Carbon::now(),
            ]);
            DataHistory::insert([
                'user_id'=>Auth::id(),
                'model'=>'Category',
                'data'=>$request->category_name,
                'action'=>'Category Updated',
                'created_at'=>Carbon::now(),
            ]);

            return back()->with('updated','Category name update successfully');
        }
        else{
            $request->validate([
                'category_name'=>'required',
                'image'=>'required',
            ]);
            $cat_info = Category::find($id);
            $delete_form = public_path('uploads/category/'.$cat_info->image);
            unlink($delete_form);

            $photo = $request->image;
            $extension = $photo->extension();
            $file_name = Str::lower(str_replace(' ','-',$request->category_name)) .'-'.uniqid().'.'.$extension;
            Image::make($photo)->save(public_path('uploads/category/'.$file_name));

            Category::find($id)->update([
                'category_name'=>$request->category_name,
                'image'=>$file_name,
                'updated_at'=>Carbon::now(),
            ]);
            DataHistory::insert([
                'user_id'=>Auth::id(),
                'model'=>'Category',
                'data'=>$request->category_name,
                'action'=>'Category Updated',
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('updated','Category update successfully');
        }
    }

    function category_delete($id){
        $category = Category::find($id);
        Category::find($id)->delete();
        DataHistory::insert([
            'user_id'=>Auth::id(),
            'model'=>'Category',
            'data'=>$category->category_name,
            'action'=>'Category Soft deleted',
            'created_at'=>Carbon::now(),
        ]);

        return back()->with('delete','Category Trush successfully');
    }

    function trash_category(){
        $trash_category = Category::onlyTrashed()->get();
        return view('admin.category.trash_category',[
            'trash_category'=>$trash_category,
        ]);
    }

    function trash_category_delete($id){
        $cat_info = Category::onlyTrashed()->find($id);
        $delete_form = public_path('uploads/category/'.$cat_info->image);
        unlink($delete_form);
        Subcategory::where('category_id',$id)->update([
            'category_id'=>1,
        ]);
        Category::onlyTrashed()->find($id)->forceDelete();

        DataHistory::insert([
            'user_id'=>Auth::id(),
            'model'=>'Category',
            'data'=>$cat_info->category_name,
            'action'=>'Category permaently deleted',
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('delete','Category delete successfully');
    }

    function category_restore($id){
        $cat_info = Category::onlyTrashed()->find($id);
        Category::onlyTrashed()->find($id)->restore();
        DataHistory::insert([
            'user_id'=>Auth::id(),
            'model'=>'Category',
            'data'=>$cat_info->category_name,
            'action'=>'Category Restore',
            'created_at'=>Carbon::now(),
        ]);

        return back()->with('restore','Category Restore successfully');
    }
}
