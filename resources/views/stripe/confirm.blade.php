@extends('layouts.base')
@section('side-title','Twitter')
@section('side-contents')
<a class="twitter-timeline" href="https://twitter.com/makao26?ref_src=twsrc%5Etfw">
  Tweets by makao26
</a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endsection
@section('title','課金決定画面')
@section('content')
<form action="/aws_laravel/public/stripe/confirm" method="POST">
  @csrf
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_51H7Xd6Ju4I2NDDkUBeKvOz9sU1IkTxGtBmCOBHm2nt2KATT0sjUEsvPeDANhok4Nklk1ZJs7oCXE6mLuNf9DQ4FA00SKUha6Gz"
    data-amount= {{$pay_num}}
    data-name="TEST"
    data-description="TESTTEST"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="ja"
    data-currency="jpy">
        <!-- LaravelユーザーはCSRFトークン忘れずに。 -->
        //$.ajaxSetup({
        //    headers: {
        //        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //    }
        //})
        // var pay_num = document.getElementById("pay_num").value;
        // var el = document.getElementsByClassName("stripe-button");
        // el.dataset.amount= pay_num;
  </script>
@endsection
