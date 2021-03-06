@extends('layouts.base')
@section('title','お問い合わせ一覧')
@section('content')
    <div>
      <form action="/admin/contact" method="post">
        @csrf
        <!-- ID：
        <input type="text" name="id"> -->
        <!-- <br> -->
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
    <div>
      <table>
        <tr><th>ID</th><th>お名前</th><th>カテゴリー</th><th>作成日</th><th>更新日</th><th>詳細</th></tr>
        @if(isset($contacts))
        @foreach($contacts as $contact)
        <tr>
          <td>{{$contact->id}}</td>
          <td>{{$contact->name}}</td>
          <td>{{$contact->getContactCategory()}}</td>
          <td>{{$contact->created_at}}</td>
          <td>{{$contact->updated_at}}</td>
          <td><a href='/admin/contact/detail?id={{$contact->id}}'>詳細</td>
        </tr>
        @endforeach
        @endif
      </table>
    </div>
    <div class="paginate">
      @if(isset($contacts))
      {{$contacts->links()}}
      @endif
    </div>
@endsection
