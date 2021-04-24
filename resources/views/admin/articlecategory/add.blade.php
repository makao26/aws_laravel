@extends('layouts.base')
@section('title','カテゴリ作成')
@section('content')
  <div>
    <form action="/admin/articlecategory/add" method="post" enctype="multipart/form-data">
      <!-- アップロードフォームの作成 -->
      @csrf
      <br>
      カテゴリー：
      <input type="text" name="title">
      @error('category')
      <p>{{$message}}</p>
      @enderror
    </form>
  </div>
@endsection
