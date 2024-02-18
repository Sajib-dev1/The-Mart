<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Size;
use App\Models\SubProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    function color(){
        $colors = Color::all();
        return view('admin.color.color',[
            'colors'=>$colors,
        ]);
    }

    function color_store(Request $request){
        $request->validate([
            'color_name'=>'required|unique:colors'
        ]);
        Color::insert([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Color added successfull');
    }

    function color_edit($id){
        $color_info = Color::find($id);
        return view('admin.color.color_edit',[
            'color_info'=>$color_info,
        ]);
    }

    function color_update( Request $request, $id){
        $request->validate([
            'color_name'=>'required|unique:colors'
        ]);
        Color::find($id)->update([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('update','Color Update successfull');
    }

    function color_delete($id){
        Color::find($id)->delete();
        return back()->with('delete','Color delete successfull');
    }

    /**
     * Size part 
     */
    function size(){
        $sizes = Size::all();
        return view('admin.size.size',[
            'sizes'=>$sizes,
        ]);
    }

    function size_store(Request $request){
        $request->validate([
            'size_name'=>'required|unique:sizes'
        ]);
        Size::insert([
            'size_name'=>$request->size_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Size added successfull');
    }

    function size_edit($id){
        $size_info = Size::find($id);
        return view('admin.size.size_edit',[
            'size_info'=>$size_info,
        ]);
    }

    function size_update( Request $request, $id){
        $request->validate([
            'size_name'=>'required|unique:sizes'
        ]);
        Size::find($id)->update([
            'size_name'=>$request->size_name,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('update','Size Update successfull');
    }

    function size_delete($id){
        Size::find($id)->delete();
        return back()->with('delete','Color delete successfull');
    }

    /**
     * Sub Product Creation
    */

     function sub_product(){
        $sub_products = SubProduct::all();
        return view('admin.sub_product.sub_product',[
            'sub_products'=>$sub_products,
        ]);
    }

    function sub_product_store(Request $request){
        $request->validate([
            'sub_product'=>'required|unique:sub_products'
        ]);
        SubProduct::insert([
            'sub_product'=>$request->sub_product,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Sub product added successfull');
    }

    function sub_product_edit($id){
        $sub_product_info = SubProduct::find($id);
        return view('admin.sub_product.sub_product_edit',[
            'sub_product_info'=>$sub_product_info,
        ]);
    }

    function sub_product_update( Request $request, $id){
        $request->validate([
            'sub_product'=>'required|unique:sub_products'
        ]);
        SubProduct::find($id)->update([
            'sub_product'=>$request->sub_product,
            'updated_at'=>Carbon::now(),
        ]);
        return back()->with('update','Sub product Update successfull');
    }

    function sub_product_delete($id){
        SubProduct::find($id)->delete();
        return back()->with('delete','Sub product delete successfull');
    }
}
