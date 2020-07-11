@extends('layouts.base')
@section('side-title','Twitter')
@section('side-contents')
<a class="twitter-timeline" href="https://twitter.com/makao26?ref_src=twsrc%5Etfw">
  Tweets by makao26
</a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endsection
@section('title','お問い合わせ')
@section('content')

<div><h1>お問い合わせ</h1></div>
<div>
  <form action="/contact" method="post" name="form">
    @csrf
    <h1 class="contact-title">お問い合わせ 内容入力</h1>
    <p>お問い合わせ内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
    <div>
      <div>
        <label>お名前・ニックネーム<span>(必須)</span></label>
        <input type="text" name="name" placeholder="例）山田太郎" value="">
        @error('name')
        <p>{{$message}}</p>
        @enderror
      </div>

      <div>
        <label>メールアドレス<span>(必須)</span></label>
        <input type="text" name="mail" placeholder="例）guest@example.com" value="">
        @error('mail')
        <p>{{$message}}</p>
        @enderror
      </div>

      <div>
        <label>お問い合わせ項目<span>(必須)</span></label>
        <select name="contact_category_id">
          <option value="1">お問い合わせ項目を選択してください</option>
          <option value="2">お仕事に関するお問い合わせ</option>
          <option value="3">私個人に関するご意見・ご感想</option>
          <option value="4">その他お問い合わせ</option>
        </select>
        @error('contact_category_id')
        <p>{{$message}}</p>
        @enderror
      </div>
      <div>
        <label>お問い合わせ内容<span>(必須)</span></label>
        <textarea name="contact_text" rows="5" placeholder="お問合せ内容を入力"></textarea>
        @error('contact_text')
        <p>{{$message}}</p>
        @enderror
      </div>
    </div>
    <button type="submit">送信</button>
  </form>
</div>
@endsection
