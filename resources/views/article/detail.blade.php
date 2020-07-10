@extends('layouts.base')
@section('side-contents')
<ul class="side-menu" style="list-style: disc;">
  <li>ダミーリスト01</li>
  <li>ダミーリスト02</li>
  <li>ダミーリスト03</li>
  <li>ダミーリスト04</li>
</ul>
@endsection
@section('title','記事詳細')
@section('content')

<div id="content_main">
  <article class="article-detail">
    <div class="article-detail-main">
      <h2 class="article-detail-title">{{$article->title}}</h2>
      <span class="article-detail-category">{{$article->category}}</span>
      <time class="article-detail-date">{{$article->updated_at}}</time>
      <p class="article-detail-text">
        {{$article->text}}
      </p>
      <figure>
        <img src="{{asset($article->image_path)}}">
      </figure>
    </div>
  </article>
</div>
@endsection
