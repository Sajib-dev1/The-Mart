<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use App\Models\SubProduct;
use App\Models\Tag;
use App\Models\Thumbnail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    function product(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $sub_products = SubProduct::all();
        $brands = Brand::all();
        $tags = Tag::all();
        return view('admin.product.product',[
            'categories'=>$categories,
            'subcategories'=>$subcategories,
            'sub_products'=>$sub_products,
            'brands'=>$brands,
            'tags'=>$tags,
        ]);
    }

    function getsubcategory(Request $request){
        $str = '<option selected disabled value="">Select Subcategory</option>';
        $subcategories = Subcategory::where('category_id',$request->category_id)->get();

        foreach ($subcategories as $sub) {
            $str .= '<option value="'.$sub->id.'">'.$sub->subcategory_name.'</option>';
        }
        echo $str;
    }

    function product_store(Request $request){
        $request->validate([
            'category_id'=>'required',
            'product_name'=>'required',
            'price'=>'required',
            'preview'=>'required',
        ]);
        $remove = array(" ","/","@",'"');
        $category_name = Category::where('id',$request->category_id)->first()->category_name;

        $sku = Str::upper(substr($category_name,0,3)).'-'.random_int(10000,100000000000000);
        $slug = str::upper(str_replace(' ','-',$request->product_name)).'-'.random_int(10000,100000000000000);
       
        $img = $request->preview;
        $extension = $img->extension();
        $file_name = Str::lower(str_replace($remove,'-',$request->product_name)).'-'.random_int(50000,900000000000) .'.'.$extension;
        Image::make($img)->resize(160,190)->save(public_path('uploads/product/preview/'.$file_name));

        $product_id = Product::insertGetId([
            'added_by'=>Auth::id(),
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'after_discount'=>$request->price - $request->price*$request->discount/100,
            'brand_id'=>$request->brand_id,
            'sku'=>$sku,
            'slug'=>$slug,
            'product_sub_id'=>$request->product_sub_id,
            'tags'=>implode(',',$request->tags),
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'additional_information'=>$request->additional_information,
            'preview'=> $file_name,
            'created_at'=>Carbon::now(),
        ]);

        $thumbnails = $request->thumbnail;
        foreach ( $thumbnails as $thun ) {
            $extension = $thun->extension();
            $thum_file_name = str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(10000,100000000000000).'.'.$extension;
            Image::make($thun)->resize(700,700)->save(public_path('uploads/product/thumbnail/'.$thum_file_name));


            Thumbnail::insert([
                'added_by'=>Auth::id(),
                'product_id'=>$product_id,
                'thumbnail'=>$thum_file_name,
                'created_at'=>Carbon::now(),
            ]);
        }
        return back()->with('success','Product Added Successfull');
    }

    function product_list(){
        $products = Product::latest()->get();
        return view('admin.product.product_list',[
            'products'=>$products,
        ]);
    }

    function product_show($id){
        $product_info = Product::find($id);
        $thumbnails = Thumbnail::where('product_id',$id)->get();
        return view('admin.product.product_show',[
            'product_info'=>$product_info,
            'thumbnails'=>$thumbnails,
        ]);
    }

    function product_delete($id){
        $product_info = Product::find($id);
        $delete_form = public_path('uploads/product/preview/'.$product_info->preview);
        unlink($delete_form);

        $thumb_info = Thumbnail::where('product_id',$id)->get();
        foreach ($thumb_info as $thumb) {
            $thumb_id = Thumbnail::find($thumb->id);
            $delete_form = public_path('uploads/product/thumbnail/'.$thumb_id->thumbnail );
            unlink($delete_form);

            Thumbnail::find($thumb->id)->delete();
        }
        Product::find($id)->delete();
        return back()->withDelete('Product Deleted Successfully');
    }

    function getproductstatus(Request $request){
        Product::find($request->product_id)->update([
            'status'=>$request->status,
            'updated_at'=>Carbon::now(),
        ]);
    }

    function getupcommingproductstatus(Request $request){
        Product::find($request->product_id)->update([
            'upcomming_status'=>$request->status,
        ]);
    }

    function inventory($id){
        $product_info = Product::find($id);
        $colors = Color::all();
        $sizes = Size::all();
        $inventories = Inventory::where('product_id',$id)->get();
        return view('admin.product.inventory',[
            'product_info'=>$product_info,
            'colors'=>$colors,
            'sizes'=>$sizes,
            'inventories'=>$inventories,
        ]);
    }

    function inventory_store(Request $request, $id){
        $request->validate([
            'color_id'=>'required',
            'size_id'=>'required',
            'quantity'=>'required',
        ]);
        if(Inventory::where('product_id',$id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->exists()){
            Inventory::where('product_id',$id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->increment('quantity',$request->quantity);
            return back()->with('increment','Inventory Increment Successfull');
            echo 'asce';
        }
        else{
            Inventory::insert([
                'product_id'=>$id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'quantity'=>$request->quantity,
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('success','Inventory Added Successfull');
        }
    }

    function inventory_delete($id){
        Inventory::find($id)->delete();
        return back()->with('delete','Inventory delete successfull');
    }
}
