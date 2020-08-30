@extends('layouts.base')
@section('title','記事編集')
@section('content')
  <div>
    <form action="/admin/article/edit" method="post" enctype="multipart/form-data">
      <!-- アップロードフォームの作成 -->
      @csrf
      <br>
      タイトル：
    <input type="text" name="title" value="{{$article->title}}">
      @error('title')
      <p>{{$message}}</p>
      @enderror
      <br>
      カテゴリー：
      <input type="text" name="category" value="{{$article->category}}">
      @error('category')
      <p>{{$message}}</p>
      @enderror
      <br>
      本文：
      {{-- textareaタブにはinputにはあるvalueが存在しない --}}
    <textarea rows="10" cols="100" name="text">{{$article->text}}</textarea>
      @error('text')
      <p>{{$message}}</p>
      @enderror
      <br>
      画像(差し替え)：
      <input type="file" name="image">
      @error('image')
      <p>{{$message}}</p>
      @enderror
      <br>
      <input type="submit" value="アップロード">
    </form>
  </div>
@endsection
