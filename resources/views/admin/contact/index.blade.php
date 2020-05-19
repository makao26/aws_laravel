@extends('layouts.base')
@section('title','お問い合わせ一覧')
@section('head')
@parent
<script   src="https://code.jquery.com/jquery-3.5.1.min.js"   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="   crossorigin="anonymous"></script>
<script src="{{ asset('js/admin/pulgin/pagination.min.js') }}"></script>

@endsection
@section('content')

<!-- お問い合わせ検索部分 -->
<div>
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
<ul>
    <div id="diary-all-contents"></div>
</ul>
<div class="pager" id="diary-all-pager"></div>
<script>
const contacts = @json($contacts);
console.log(contacts);
$(function(){
  $('#diary-all-pager').pagination({
    dataSource: contacts,
    locator: 'items',
    totalNumberLocator: function(response) {
      // you can return totalNumber by analyzing response content
      return Math.floor(Math.random() * (1000 - 100)) + 100;
    },
    pageSize: 5,
    ajax: {
      beforeSend: function() {
        $('#diary-all-contents').html(template(data));
      }
    },
    callback: function(data, pagination) {
      // template method of yourself
      $('#diary-all-contents').html(template(data));
    }
  })
  function template(dataArray) {
    return dataArray.map(function(data) {
      return '<li class="list">'
      + '<p class="name">' + data.name + '</p>'
      + '<p class="contact_category_id">' + data.contact_category_id + '</p>'
      + '<p class="mail">' + data.mail + '</p>'
    })
  }
});
</script>
@endsection
