<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StripeController extends Controller
{
  public function index(){
    Log::debug('デバッグメッセージ01');
    return view('stripe.index');
  }

  public function singleStripe(Request $request){
    Log::debug('デバッグメッセージ02');
    // コントローラのアクションにベタ書きしてます
    $token = env('STRIPE_SECRET');
    // キーの設定。
    \Stripe\Stripe::setApiKey($token);
    /*
    入力してもらったカード情報をsubmitすると、"stripeToken"というキーで取得できるトークンを利用。
    1000円の課金。
    */
    $customer = \Stripe\Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
              ));

    Log::debug($request->email);
    $charge = \Stripe\Charge::create([
      'customer' => $customer->id,
      'amount' => 1000,
      'currency' => 'jpy'
    ]);

    return view('stripe.index');
  }
}
