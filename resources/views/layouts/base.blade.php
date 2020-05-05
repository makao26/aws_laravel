<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="icon" type="image/png" href="{{ asset('/assets/favicon.png') }}">
</head>
<body>
  <header class="header">
    <div class="banner">
      <img class="banner-img" src="{{ asset('/assets/banner.jpg') }}" alt="banner-img">
      <p class="title-in-banner">@yield('title')</p>
    </div>

  </header>
  <nav>
    <ul class="nav">
      <li><a href="https://www.google.com">ダミーリンク01(google)</a></li>
      <li><a href="https://www.yahoo.co.jp">ダミーリンク02(yahoo japan)</a></li>
      <li><a href="https://www.apple.com/jp/">ダミーリンク03(apple)</a></li>
    </ul>
  </nav>
  <main>
    <aside class="side1">
      <h3 class="side-title">カテゴリー</h3>
      <ul class="side-menu">
        <li>ダミーリスト01</li>
        <li>ダミーリスト02</li>
        <li>ダミーリスト03</li>
        <li>ダミーリスト04</li>
      </ul>
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
