@extends('layouts.base')
@section('title','カテゴリ一覧')
@section('content')
  <div>
    <div>
      <table>
        <tr><th>ID</th><th>カテゴリID</th><th>カテゴリー</th><th>作成日</th><th>更新日</th><th>詳細</th></tr>
        @if(isset($article_categories))
        @foreach($article_categories as $article_category)
        <tr>
          <td>{{$article_category->id}}</td>
          <td>{{$article_category->category_id}}</td>
          <td>{{$article->category}}</td>
          <td>{{$article->created_at}}</td>
          <td>{{$article->updated_at}}</td>
          <td><a href='/admin/articlecategory/detail?id={{$article->id}}'>詳細</td>
        </tr>
        @endforeach
        @endif
      </table>
    </div>
  </div>
@endsection
