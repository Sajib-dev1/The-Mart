<?php

namespace App\Http\Controllers;

use App\Models\CancelOrder;
use App\Models\Order;
use App\Models\ReturnProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class OrdersController extends Controller
{
    function orders(){
        $orders = Order::where('customer_id',Auth::guard('customer')->id())->get();
        return view('admin.orders.orders',[
            'orders'=>$orders,
        ]);
    }
    
    function order_status_update(Request $request,$id){
        Order::find($id)->update([
            'status'=>$request->status,
        ]);
        return back();
    }
    /**==================================================
     *       Order Cancel request 
     * ================================================*/

     function cancel_order($id){
        $order_info = Order::find($id);
        return view('frontend.customer.cancel_order',[
            'order_info'=>$order_info,
        ]);
    }

    function cancel_order_store(Request $request){
        $request->validate([
            'resion'=>'required',
        ]);
        CancelOrder::insert([
            'order_id'=>$request->order_id,
            'resion'=>$request->resion,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Order Cancel request submit');
    }

     function order_cancel_request(Request $request){
        $cancel_orders = CancelOrder::all();
        return view('admin.orders.order_cancel_request',[
            'cancel_orders'=>$cancel_orders,
        ]);
     }

     function cancel_order_accept($id){
        $detels = CancelOrder::find($id);
        $find_id = Order::where('order_id',$detels->order_id)->first()->id;
        Order::find($find_id)->update([
            'status'=>5,
        ]);
        CancelOrder::find($id)->delete();
        return back();
     }

     /**================================================
      *             Product reatun
      ================================================
      */

     function return_product($id){
        $detels = Order::find($id);
        return view('frontend.customer.return_product',[
            'detels'=>$detels,
        ]);
     }

     function return_product_store(Request $request){
        $request->validate([
            'resion'=>'required',
            'image'=>'required',
        ]);

        $photo = $request->image;
        $extension = $photo->extension();
        $file_name = uniqid().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/return_product/'.$file_name));

        ReturnProduct::insert([
            'order_id'=>$request->order_id,
            'resion'=>$request->resion,
            'image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Product return request successfull');
     }

     function order_return_request(){
        $returns = ReturnProduct::all();
        return view('admin.orders.order_return_request',[
            'returns'=>$returns,
        ]);
     }

     function return_product_accept($id){
        $return_detels = ReturnProduct::find($id);
        $find_id = Order::where('order_id',$return_detels->order_id)->first()->id;
        Order::find($find_id)->update([
            'status'=>1,
        ]);

        $cat_info = ReturnProduct::find($id);
        $delete_form = public_path('uploads/return_product/'.$cat_info->image);
        unlink($delete_form);

        ReturnProduct::find($id)->delete();
        return back();
     }
}
