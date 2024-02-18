<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCustomer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    function quation_store(Request $request){
        FaqCustomer::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'note'=>$request->note,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Faq store successfull');
    }
}
