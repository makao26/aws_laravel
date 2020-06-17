@extends('layouts.base')
@section('title','記事投稿')
@section('content')
  <div>
    <form action="/admin/article/add" method="post" enctype="multipart/form-data">
      <!-- アップロードフォームの作成 -->
      @csrf
      <br>
      タイトル：
      <input type="text" name="title">
      @error('title')
      <p>{{$message}}</p>
      @enderror
      <br>
      カテゴリー：
      <input type="text" name="category">
      @error('category')
      <p>{{$message}}</p>
      @enderror
      <br>
      本文：
      <textarea rows="10" cols="100" name="text">本文</textarea>
      @error('text')
      <p>{{$message}}</p>
      @enderror
      <br>
      画像：
      <input type="file" name="image">
      @error('image')
      <p>{{$message}}</p>
      @enderror
      <br>
      <input type="submit" value="アップロード">
    </form>
  </div>
@endsection
