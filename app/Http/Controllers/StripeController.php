<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/*
*/
class StripeController extends Controller
{
  public function index(){
    Log::debug('デバッグメッセージ01-01');
    return view('stripe.index');
  }

  public function postPayNum(Request $request){
    Log::debug('デバッグメッセージ01-02');
    $pay_num = $request -> pay_num;
    $request->session()->put('pay_num', $pay_num);
    return redirect('/stripe/confirm');
  }

  public function confirm(Request $request){
    Log::debug('デバッグメッセージ02-01');
    $pay_num = $request->session()->get("pay_num");
    return view('stripe.confirm',['pay_num' => $pay_num]);
  }

  public function singleStripe(Request $request){
    Log::debug('デバッグメッセージ02-02');
    // // コントローラのアクションにベタ書きしてます
    $token = env('STRIPE_SECRET');
    // キーの設定。
    \Stripe\Stripe::setApiKey($token);
    /*
    入力してもらったカード情報をsubmitすると、"stripeToken"というキーで取得できるトークンを利用。
    1000円の課金。
    */
    $token = $_POST['stripeToken'];
    $pay_num = $request->session()->get("pay_num");
    // Create a charge: this will charge the user's card
    try {
      $charge = \Stripe\Charge::create(array(
        "amount" => $pay_num, // 課金額はココで調整
        "currency" => "jpy",
        "source" => $token,
        "description" => "Example charge"
        ));
        Log::debug('デバッグメッセージ03-01');
        Log::debug($request);
        session()->flash('flash_message', '投げ銭ありがとうございます!');
    } catch(\Stripe\Error\Card $e) {
      // The card has been declined
      Log::debug('デバッグメッセージ03-02');
    }
    return redirect('/stripe');
  }
}
