<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class IncruadController extends Controller
{
    function subcategories($id){
        $products = Product::where('status',1)->where('subcategory_id',$id)->get();
        return view('frontend.incrouad.incruad',[
            'products'=>$products,
        ]);
    }

    function ban_product($id){
        $products = Product::where('status',1)->where('subcategory_id',$id)->get();
        return view('frontend.incrouad.incruad',[
            'products'=>$products,
        ]);
    }

    function categories($id){
        $products = Product::where('status',1)->where('category_id',$id)->get();
        return view('frontend.incrouad.incruad',[
            'products'=>$products,
        ]);
    }

    function upcomming_shop($id){
        $products = Product::where('upcomming_status',1)->get();
        return view('frontend.incrouad.incruad',[
            'products'=>$products,
        ]);
    }

    function tag_product($id){
        $all = '';
        foreach(Product::all() as $product){
            $explode = explode( ',',$product->tags );
            if(in_array( $id, $explode )){
                $all .= $product->id.',';
            }
        }
        $explode2 = explode(',',$all);
         $products = Product::find($explode2);
         return view('frontend.incrouad.incruad',[
            'products'=>$products,
        ]);
    }

    function offer($id){
        $products = Product::where('status',1)->where('discount','<=',50)->get();
        return view('frontend.incrouad.incruad',[
            'products'=>$products,
        ]);
    }

    function new_offer($id){
        $products = Product::where('status',1)->where('discount','<=',70)->get();
        return view('frontend.incrouad.incruad',[
            'products'=>$products,
        ]);
    }

    function product_all_item(){
        $products = Product::where('status',1)->get();
        return view('frontend.incrouad.incruad',[
            'products'=>$products,
        ]);
    }

    function sub_product_name($id){
        $products = Product::where('status',1)->where('product_sub_id',$id)->get();
        return view('frontend.incrouad.incruad',[
            'products'=>$products,
        ]);
    }
}
