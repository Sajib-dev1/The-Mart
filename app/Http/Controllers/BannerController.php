<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    function banner(){
        $banners = Banner::all();
        $product_types = Subcategory::all();
        return view('admin.banner.banner',[
            'banners'=>$banners,
            'product_types'=>$product_types,
        ]);
    }

    function banner_store(Request $request){
        $request->validate([
            'title'=>'required|unique:banners',
            'product_type'=>'required|unique:banners',
            'image'=>'required',
        ]);
        $photo = $request->image;
        $extension = $photo->extension();
        $file_name = Str::lower(str_replace(' ','-',$request->title)) .'-'.uniqid().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/banner/'.$file_name));

        Banner::insert([
            'title'=>$request->title,
            'product_type'=>$request->product_type,
            'image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Banner added successfull');
    }

    function banner_edit($id){
        $banner_info = Banner::find($id);
        $product_types = Subcategory::all();
        return view('admin.banner.banner_edit',[
            'banner_info'=>$banner_info,
            'product_types'=>$product_types,
        ]);
    }

    function banner_update( Request $request, $id){
        if($request->image == null){
            $request->validate([
                'title'=>'required|unique:banners',
                'product_type'=>'required',
            ]);
            Banner::find($id)->update([
                'title'=>$request->title,
                'product_type'=>$request->product_type,
                'updated_at'=>Carbon::now(),
            ]);
            return back()->with('update','Banner Update successfull');
        }
        else{
            $ban_info = Banner::find($id);
            $delete_form = public_path('uploads/banner/'.$ban_info->image);
            unlink($delete_form);

            $photo = $request->image;
            $extension = $photo->extension();
            $file_name = Str::lower(str_replace(' ','-',$request->title)) .'-'.uniqid().'.'.$extension;
            Image::make($photo)->save(public_path('uploads/banner/'.$file_name));
            $request->validate([
                'title'=>'required',
                'image'=>'required',
            ]);
            Banner::find($id)->update([
                'title'=>$request->title,
                'product_type'=>$request->product_type,
                'image'=>$file_name,
                'updated_at'=>Carbon::now(),
            ]);
            return back()->with('update','Banner Update successfull');
        }
    }

    function banner_delete($id){
        Banner::find($id)->delete();
        return back()->with('delete','banner delete successfull');
    }
}
