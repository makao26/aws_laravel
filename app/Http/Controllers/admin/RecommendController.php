<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

class RecommendController extends Controller
{
    
    public function index(){
        return view('admin.recommend.index');
    }
}
