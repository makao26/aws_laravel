@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="home-menu">
                <ul>
                    <li><a href="/admin/article">記事一覧</a></li>
                    <li><a href="/admin/clothes-cross">服交換アイテム一覧</a></li>
                    <li><a href="/admin/recommend">服交換おすすめアイテム</a></li>
                </ul> 
            </div>
        </div>
    </div>
</div>
@endsection
