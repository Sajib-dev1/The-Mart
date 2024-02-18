<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function tag(){
        $tags = Tag::latest()->get();
        return view('admin.tag.tag',[
            'tags'=>$tags,
        ]);
    }

    function tag_store(Request $request){
        $request->validate([
            'tag'=>'required|unique:tags'
        ]);
        Tag::insert([
            'tag'=>$request->tag,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Tag added successfull');
    }

    function tag_edit($id){
        $tag_info = Tag::find($id);
        return view('admin.tag.tag_edit',[
            'tag_info'=>$tag_info,
        ]);
    }

    function tag_update ( Request $request, $id){
        $request->validate([
            'tag'=>'required|unique:tags'
        ]);
        Tag::find($id)->update([
            'tag'=>$request->tag,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('update','Tag Update successfull');
    }

    function tag_delete($id){
        Tag::find($id)->delete();
        return back()->with('delete','Tag delete successfull');
    }
}
