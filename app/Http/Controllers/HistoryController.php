<?php

namespace App\Http\Controllers;

use App\Models\DataHistory;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    function data_history(){
        $historys = DataHistory::latest()->get();
        return view('admin.admin_history.data_history',[
            'historys'=>$historys,
        ]);
    }
}
