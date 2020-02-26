<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
  public function index(){
    $data = ['msg'=>'roomコントローラー'];
    return view('room.index',$data);
  }
}
