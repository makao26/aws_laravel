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

<div>
  <form action="/contact" method="post" name="form" onSubmit="return check()">
    @csrf
    <p>お問い合わせ内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
    <div>
      <div>
        <label>お名前・ニックネーム<span>(必須)</span></label>
        <input id="contact-name" type="text" name="name" placeholder="例）山田太郎" value="">
        @error('name')
        <p>{{$message}}</p>
        @enderror
      </div>

      <div>
        <label>メールアドレス<span>(必須)</span></label>
        <input id="contact-mail" type="text" name="mail" placeholder="例）guest@example.com" value="">
        @error('mail')
        <p>{{$message}}</p>
        @enderror
      </div>

      <div>
        <label>お問い合わせ項目<span>(必須)</span></label>
        <select id="contact-category" name="contact_category_id">
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
        <textarea id="contact-text" class="contact-text" name="contact_text" rows="5" placeholder="お問合せ内容を入力"></textarea>
        @error('contact_text')
        <p>{{$message}}</p>
        @enderror
      </div>
    </div>
    <button type="submit">送信</button>
    <input type="submit" value="送信">
    <input type="button" onclick="dialog()" value="本文入力内容">
  </form>
</div>

<script language="javascript" type="text/javascript">
  function getName() {
    var input_contact_name = document.getElementById("contact-name").value;
    // input_contact_name = "入力された内容は「" + input_contact_text + "」です。";
    return input_contact_name;
  }

  function getMail() {
    var input_contact_mail = document.getElementById("contact-mail").value;
    return input_contact_mail;
  }

  function getCategory() {
    var input_contact_category = document.getElementById("contact-category").value;
    return input_contact_category;
  }

  function getText() {
    var input_contact_text = document.getElementById("contact-text").value;
    return input_contact_text;
  }

  function dialog(){
    var name = getName();
    var mail = getMail();
    var category = getCategory();
    var text = getText();
    var input ='入力した内容は以下の内容です。\n名前：' + name + '\nメールアドレス：' + mail + '\nお問い合わせ項目：'+ category + '\nお問い合わせ内容：'+ text;
    var rst = window.confirm(input);
    return rst;
  }

  function check(){
    if(dialog()){ // 確認ダイアログを表示
      return true; // 「OK」時は送信を実行
    }else{ // 「キャンセル」時の処理
      window.alert('キャンセルされました'); // 警告ダイアログを表示
      return false; // 送信を中止
    }
  }
</script>


@endsection
