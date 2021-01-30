<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClothesCrossController extends Controller
{
    public function index(){
        return view('admin.clothes-cross.index');
    }

    //レビュー投稿機能
    public function add(Request $request){
        return view('admin.clothes-cross.add');
    }
    public function create(Request $request){
        
        return redirect('/admin/clothes-cross/add');
    }
}
