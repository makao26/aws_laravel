@extends('layouts.base')
@section('side-title','記事カテゴリー')
@section('side-contents')
<ul class="side-menu" style="list-style: disc;">
  @foreach($category_list as $category)
  <li>
    <a href= "/article?category={{$category->category}}" >
      {{$category->category}}
    </a>
  </li>
  @endforeach
</ul>
@endsection
@section('title','記事一覧')
@section('content')
<div id="content_main">
  @if(isset($articles))
  @foreach($articles as $article)
  <article class="article">
    <figure>
      <img src="{{asset($article->image_path)}}">
    </figure>
    <div class="article-info">
      <a href= "/article/detail?id={{$article->id}}" >
        <h1>{{$article->title}}</h1>
      </a>
      <span class="article-category">{{$article->category}}</span>
      <time class="article-date">{{$article->updated_at}}</time>
      <p>
        {{$article->text}}
      </p>
    </div>
  </article>
  @endforeach
  @endif

  <script>
      const name = @json($data_num);
      console.log(name);      
  </script>
  <div id="pagination"></div>
</div>
@endsection
