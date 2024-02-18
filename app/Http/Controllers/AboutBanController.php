<?php

namespace App\Http\Controllers;

use App\Models\AboutBan;
use App\Models\AboutGallery;
use App\Models\AboutService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutBanController extends Controller
{
    function aboutban(){
        $about_ban = AboutBan::first();
        return view('admin.about.about',[
            'about_ban'=>$about_ban,
        ]);
    }

    function aboutban_update(Request $request,$id){
        if($request->image == ''){
            AboutBan::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'updated_at'=>Carbon::now(),
            ]);
            return back()->with('update','About update successfull');
        }
        else{
            $about_info = AboutBan::find($id);
            $delete_form = public_path('uploads/about/'.$about_info->image);
            unlink($delete_form);

            $photo = $request->image;
            $extension = $photo->extension();
            $file_name = uniqid().'.'.$extension;
            Image::make($photo)->save(public_path('uploads/about/'.$file_name));

            AboutBan::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'image'=>$file_name,
                'updated_at'=>Carbon::now(),
            ]);
            return back()->with('update','About update successfull');
        }
    }

    function about_service(){
        $about_services = AboutService::all();
        return view('admin.about.about_service',[
            'about_services'=>$about_services,
        ]);
    }

    function about_service_store(Request $request){
        $request->validate([
            'name'=>'required',
            'title'=>'required',
            'image'=>'required',
        ]);
        $photo = $request->image;
        $extension = $photo->extension();
        $file_name = uniqid().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/about/'.$file_name));

        AboutService::insert([
            'name'=>$request->name,
            'title'=>$request->title,
            'image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','About service upload successfull');
    }

    function about_service_delete($id){
        $about_info = AboutService::find($id);
        $delete_form = public_path('uploads/about/'.$about_info->image);
        unlink($delete_form);
        AboutService::find($id)->delete();
        return back()->with('delete','About delete successfull');
    }

    function about_gallery_part(){
        $about_gallarys = AboutGallery::all();
        return view('admin.about.about_gallery_part',[
            'about_gallarys'=>$about_gallarys,
        ]);
    }

    function about_galery_store(Request $request){
        $request->validate([
            'big_image'=>'required',
        ]);

        $photo = $request->big_image;
        $extension = $photo->extension();
        $file_name = uniqid().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/about/'.$file_name));

        AboutGallery::insert([
            'big_image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','About service upload successfull');
    }

    function about_gallery_delete($id){
        $about_info = AboutGallery::find($id);
        $delete_form = public_path('uploads/about/'.$about_info->big_image);
        unlink($delete_form);

        AboutGallery::find($id)->delete();
        return back()->with('delete','About gelery delete successfull');
    }
}
