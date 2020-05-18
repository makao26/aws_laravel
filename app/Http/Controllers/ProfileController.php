<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
  public function index(Request $request){
    Log::info('info log');
    return view('profile.index');
  }
}
