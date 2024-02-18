<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Ship;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    function shopping_cart(){
        $orders = Order::latest()->get();
        return view('admin.shopping.shopping_cart',[
            'orders'=>$orders,
        ]);
    }

    function order_status_update(Request $request,$id){
        Order::find($id)->update([
            'status'=>$request->status,
        ]);
        return back();
    }

    function shopping_invoice($id){
        $order_id = Order::find($id);
        $order_info = Order::where('order_id',$order_id->order_id)->get();
        $belling_info = Billing::where('order_id',$order_id->order_id)->get();
        $shipping_info = Ship::where('order_id',$order_id->order_id)->get();
        $order_products = OrderProduct::where('order_id',$order_id->order_id)->get();

        return view('admin.shopping.shopping_invoice',[
            'order_info'=>$order_info,
            'belling_info'=>$belling_info,
            'shipping_info'=>$shipping_info,
            'order_products'=>$order_products,
        ]);
    }
}
