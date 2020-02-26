<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonTestController extends Controller
{
  public function index(){
    $data = ['act'=>'get','key1'=>'','key2'=>''];
    return view('json-test.index',$data);
  }
  public function postJson(Request $request){
    $json1 = $request->input('key1');
    $json2 = $request->input('key2');
    $data = ['act'=>'post','key1' => $json1, 'key2' => $json2];
    return view('json-test.index',$data);
  }
}
