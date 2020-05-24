@extends('layouts.base')
@section('title','お問い合わせ詳細')
@section('head')
<!-- @parent -->
<!-- <script   src="https://code.jquery.com/jquery-3.5.1.min.js"   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="   crossorigin="anonymous"></script>
<script src="{{ asset('js/admin/pulgin/pagination.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
<style>
  ul {list-style: none;}
</style> -->
@endsection
@section('content')
<!-- 詳細情報部分 -->
<div class="detail">
  <table>
    <tbody>
      <tr>
        <th>ID</th>
        <td>{{$contact->id}}</td>
        <th>ID</th>
        <td>{{$contact->id}}</td>
        <th>名前・ニックネーム</th>
        <td>{{$contact->name}}</td>
        <th>カテゴリー</th>
        <td>{{$contact->getContactCategory()}}</td>
        <th>本文</th>
        <td>{{$contact->contact_text}}</td>
      </tr>
    </tbody>
  </table>
</div>
<hr>
<!-- お問い合わせ返信部分 -->
<div class="mail">
</div>
<!-- お問い合わせ検索部分 -->
<div class="search">
  <form action="/aws_laravel/public/admin/contact" method="post">
    @csrf
    名前・ニックネーム：
    <input type="text" name="name">
    <br>
    カテゴリー：
    <select name="contact_category_id">
      <option value="1">お問い合わせ項目を選択してください</option>
      <option value="2">お仕事に関するお問い合わせ</option>
      <option value="3">私個人に関するご意見・ご感想</option>
      <option value="4">その他お問い合わせ</option>
    </select>
    <br>
    作成日：
    <input type="date" class="today" name="created_at_min">
    〜
    <input type="date" class="today" name="created_at_max">
    <br>
    更新日：
    <input type="date" class="today" name="updated_at_min">
    〜
    <input type="date" class="today" name="updated_at_max">
    <br>
    <input type="submit" value="検索">
  </form>
</div>
<hr>
<!-- お問い合わせ一覧表示部分 -->
<!-- <style>
  ul {list-style: none;}
</style> -->
<div class="disp">
  <ul>
    <div id="diary-all-contents"></div>
  </ul>
  <div class="pager" id="diary-all-pager"></div>
</div>
<script>
const contacts = @json($contacts);
console.log(contacts);
$(function(){
  $('#diary-all-pager').pagination({
    dataSource: contacts,
    pageSize: 5,
    prevText: '&lt; 前へ',
    nextText: '次へ &gt;',
    callback: function(data, pagination) {
      // template method of yourself
      $('#diary-all-contents').html(template(data));
    }
  })
  function template(dataArray) {
    return dataArray.map(function(data) {
      return '<li class="list"  >'
      + '<p class="name">' + data.name + '</p>'
      + '<p class="contact_category_id">' + data.contact_category_id + '</p>'
      + '<p class="mail">' + data.mail + '</p></li>'
    })
  }
});
</script>
@endsection
