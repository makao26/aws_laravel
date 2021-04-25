@extends('layouts.base')
@section('title','カテゴリ作成')
@section('content')
  <div>
    <form action="/aws_laravel/public/admin/articlecategory/add" method="post" enctype="multipart/form-data">
      <!-- アップロードフォームの作成 -->
      @csrf
      <br>
      カテゴリー：
      <input type="text" name="category">
      @error('category')
      <p>{{$message}}</p>
      @enderror
      <br>
      <input type="submit" value="カテゴリー追加">
    </form>
  </div>
@endsection
