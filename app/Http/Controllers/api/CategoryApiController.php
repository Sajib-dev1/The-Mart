<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    function get_category(){
        $categories = Category::all();
        return response()->json($categories);
    }
}
