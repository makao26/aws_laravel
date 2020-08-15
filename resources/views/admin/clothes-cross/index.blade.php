@extends('layouts.base')
@section('side-title','Twitter')
@section('side-contents')
<a class="twitter-timeline" href="https://twitter.com/makao26?ref_src=twsrc%5Etfw">
  Tweets by makao26
</a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endsection
@section('title','クロースクロッシング')
@section('content')
<div class="wrapper-grid">
    <div class="tile-item">
        <figure class="tile-figure">
            <img src="{{ asset('/assets/test01.jpg') }}">
        </figure>
        <p>写真キャプション写真キャプション01</p>
    </div>
    <div class="tile-item">
        <figure class="tile-figure">
            <img src="{{ asset('/assets/test01.jpg') }}">
        </figure>
        <p>写真キャプション写真キャプション02</p>
    </div>
    <div class="tile-item">
        <figure class="tile-figure">
            <img src="{{ asset('/assets/test01.jpg') }}">
        </figure>
        <p>写真キャプション写真キャプション03</p>
    </div>
    <div class="tile-item">
        <figure class="tile-figure">
            <img src="{{ asset('/assets/test01.jpg') }}">
        </figure>
        <p>写真キャプション写真キャプション04</p>
    </div>
    <div class="tile-item">
        <figure class="tile-figure">
            <img src="{{ asset('/assets/test01.jpg') }}">
        </figure>
        <p>写真キャプション写真キャプション05</p>
    </div>
    <div class="tile-item">
        <figure class="tile-figure">
            <img src="{{ asset('/assets/test01.jpg') }}">
        </figure>
        <p>写真キャプション写真キャプション06</p>
    </div>
    <div class="tile-item">
        <figure class="tile-figure">
            <img src="{{ asset('/assets/test01.jpg') }}">
        </figure>
        <p>写真キャプション写真キャプション07</p>
    </div>
    <div class="tile-item">
        <figure class="tile-figure">
            <img src="{{ asset('/assets/test01.jpg') }}">
        </figure>
        <p>写真キャプション写真キャプション08</p>
    </div>
    <div class="tile-item">
        <figure class="tile-figure">
            <img src="{{ asset('/assets/test01.jpg') }}">
        </figure>
        <p>写真キャプション写真キャプション09</p>
    </div>
</div>
@endsection
