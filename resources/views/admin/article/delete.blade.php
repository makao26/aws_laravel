@extends('layouts.base')
@section('title','記事削除')
@section('content')
  <div>
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
  </div>
@endsection
