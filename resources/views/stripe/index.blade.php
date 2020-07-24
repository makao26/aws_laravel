@extends('layouts.base')
@section('side-title','Twitter')
@section('side-contents')
<a class="twitter-timeline" href="https://twitter.com/makao26?ref_src=twsrc%5Etfw">
  Tweets by makao26
</a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endsection
@section('title','課金額入力画面')
@section('content')
<form action="/aws_laravel/public/stripe" method="POST">
  @csrf
  <input type="number" min="0" max="255" name="pay_num" value="{{ old('pay_num') }}">
  <input type="submit" value="投げ銭金額決定">
</form>
@endsection
