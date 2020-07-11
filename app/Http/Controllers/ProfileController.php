<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Utility\Utility;

class ProfileController extends Controller
{
  public function index(Request $request){
    Log::debug('start');
    $url = request()->fullUrl(); //getパラメータ含めて取得
    Log::debug('url'.$url);
    Utility::accessCounter($url);
    Log::debug('end');
    return view('profile.index');
  }
}
