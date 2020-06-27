@extends('layouts.base')
@section('title','記事一覧')
@section('content')

<div>
  <form action="/laravelapp/public/admin/article" method="post">
    @csrf
    ID：
    <input type="text" name="id">
    <br>
    タイトル：
    <input type="text" name="title">
    <br>
    カテゴリー：
    <input type="text" name="category">
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
<div>

  <table>
    <tr><th>ID</th><th>タイトル</th><th>カテゴリー</th><th>作成日</th><th>更新日</th><th>詳細</th></tr>
    @if(isset($articles))
    @foreach($articles as $article)
    <tr>
      <td>{{$article->id}}</td>
      <td>{{$article->title}}</td>
      <td>{{$article->category}}</td>
      <td>{{$article->text}}</td>
      <td>{{$article->created_at}}</td>
      <td>{{$article->updated_at}}</td>
      <td><a href='/aws_laravel/public/admin/article/detail?id={{$article->id}}'>詳細</td>
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
