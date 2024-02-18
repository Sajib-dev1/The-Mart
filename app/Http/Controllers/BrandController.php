<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    function brand_add(){
        $brands = Brand::all();
        return view('admin.brand.brand',[
            'brands'=>$brands,
        ]);
    }

    function brand_store(Request $request){
        $request->validate([
            'brand_name'=>'required|unique:brands',
            'image'=>'required',
        ]);
        $photo = $request->image;
        $extension = $photo->extension();
        $file_name = Str::lower(str_replace(' ','-',$request->brand_name)) .'-'.uniqid().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/brand/'.$file_name));

        Brand::insert([
            'brand_name'=>$request->brand_name,
            'image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Brand Added Successfull');
    }

    function brand_edit($id){
        $brand_info = Brand::find($id);
        return view('admin.brand.brand_edit',[
            'brand_info'=>$brand_info,
        ]);
    }

    function brand_update(Request $request, $id){
        if ($request->image == null) {
            $request->validate([
                'brand_name'=>'required|unique:brands',
            ]);
            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'updated_at'=>Carbon::now(),
            ]);
            return back()->with('updated','Brand name update successfully');
        }
        else{
            $request->validate([
                'brand_name'=>'required',
                'image'=>'required',
            ]);
            $ban_info = Brand::find($id);
            $delete_form = public_path('uploads/brand/'.$ban_info->image);
            unlink($delete_form);

            $photo = $request->image;
            $extension = $photo->extension();
            $file_name = Str::lower(str_replace(' ','-',$request->brand_name)) .'-'.uniqid().'.'.$extension;
            Image::make($photo)->save(public_path('uploads/brand/'.$file_name));

            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'image'=>$file_name,
                'updated_at'=>Carbon::now(),
            ]);
            return back()->with('updated','Brand update successfully');
        }
    }

    function brand_delete($id){
        Brand::find($id)->delete();
        return back()->with('delete','Brand Trush successfully');
    }

    function trash_brand(){
        $trash_brand = Brand::onlyTrashed()->get();
        return view('admin.brand.trash_brand',[
            'trash_brand'=>$trash_brand,
        ]);
    }

    function brand_restore($id){
        Brand::onlyTrashed()->find($id)->restore();
        return back();
    }

    function trash_brand_delete($id){
        $brand_info = Brand::onlyTrashed()->find($id);
        $delete_form = public_path('uploads/brand/'.$brand_info->image);
        unlink($delete_form);

        Brand::onlyTrashed()->find($id)->forceDelete();
        return back()->with('delete','Brand delete successfully');
    }
}
