@extends('layouts.base')
@section('title','お問い合わせ詳細')
@section('content')
<!-- 詳細情報部分 -->
<div class="detail">
  <table>
    <tbody>
      <tr>
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
<div class="mail-form">
  <form action="/admin/contact/detail" method="post">
    @csrf
    本文: <br>
    <textarea name="return_text" rows="5" placeholder="お問合せの返答を入力"></textarea>
    <input type="submit">
  </form>
</div>
@endsection
