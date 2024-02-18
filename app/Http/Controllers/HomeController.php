<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function dashboard(){
        $users = User::all();
        $customers = Customer::all();
        $orders = Order::all();
        return view('dashboard',[
            'users'=>$users,
            'customers'=>$customers,
            'orders'=>$orders,
        ]);
    }
}
