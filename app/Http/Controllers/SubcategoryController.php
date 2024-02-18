<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    function subcategory_add(){
        $subcategories = Subcategory::all();
        $categories = Category::all();
        return view('admin.subcategory.subcategory',[
            'subcategories'=>$subcategories,
            'categories'=>$categories,
        ]);
    }

    function subcategory_store(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required',
        ]);
        if(Subcategory::where('category_id',$request->category_id)->where('subcategory_name',$request->subcategory_name)->exists()){
            return back()->with('exists','Subcategory already exists');
        }
        else{
            Subcategory::insert([
                'category_id'=>$request->category_id,
                'subcategory_name'=>$request->subcategory_name,
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('success','Subcategory Added Successfull');
        }
    }

    function subcategory_edit($id){
        $subcategory_info = Subcategory::find($id);
        $categories = Category::all();
        return view('admin.subcategory.subcategory_edit',[
            'subcategory_info'=>$subcategory_info,
            'categories'=>$categories,
        ]);
    }

    function subcategory_update(Request $request , $id){
        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required',
        ]);
        Subcategory::find($id)->update([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('success','Subcategory Updated Successfull');
    }

    function subcategory_delete($id){
        Subcategory::find($id)->delete();
        return back()->with('delete','Subcategory Trush successfully');
    }

    function trash_subcategory(){
        $trush_subcategory = Subcategory::onlyTrashed()->get();
        return view('admin.subcategory.trash_subcategory',[
            'trush_subcategory'=>$trush_subcategory,
        ]);
    }

    function trash_subcategory_delete($id){
        Subcategory::onlyTrashed()->find($id)->forceDelete();
        return back()->with('delete','Subcategory delete successfully');
    }

    function subcategory_restore($id){
        Subcategory::onlyTrashed()->find($id)->restore();
        return back()->with('restore','Subcategory Restore successfully');
    }
}
