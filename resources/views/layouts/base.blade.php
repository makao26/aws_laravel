<html>
@section('head')
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="icon" type="image/png" href="{{ asset('/assets/favicon.png') }}">
</head>
@Show
<body>
  <header class="header">
    <div class="banner">
      <img class="banner-img" src="{{ asset('/assets/banner.jpg') }}" alt="banner-img">
      <p class="title-in-banner">@yield('title')</p>
    </div>

  </header>
  <nav>
    <ul class="nav">
      <li><a href= "/profile">プロフィール</a></li>
      <li><a href= "/article">記事一覧</a></li>
      <li><a href= "/contact">お問い合わせ</a></li>
    </ul>
  </nav>
  <main>
    <aside class="side1">
      <h3 class="side-title">カテゴリー</h3>
      <div class="side-contents">
        @yield('side-contents')
      <div>
    </aside>
    <section class="page_main">
      <div id="content_main">
        @yield('content')
      </div>
    </section>
  </main>
  <footer>
    <div class="footer">
      <p><small>&copy;makao26</small></p>
    </div>
  </footer>
</body>
</html>
