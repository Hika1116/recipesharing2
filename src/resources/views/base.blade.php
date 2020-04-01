<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="description" content="ページの内容を表す文章" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="canonical" href="正規化するURL" /><!-- URLの正規化 -->
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{mix('css/base.css')}}" defer>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ffcdbb6add.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <!-- <h3><a href="#">Rercipe Sharing</a></h3>
    <div id="nav-area">
      <nav class="nav-bar">
        <ul>
          <li><a href="#">hikaruさん</a></li>
          <li>|</li>
          <li><a href="#">LogOut</a></li>
        </ul>
      </nav>
    </div> -->

    <nav class="navbar navbar-expand-lg">
      <h2><a class="navbar-brand" href="#">Recipe Sharing</a></h2>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Hikaru</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">logout</a>
          </li>
        </ul>
      </div>
    </nav>

  </header>
  <div class="container">
    @yield('container')
  </div>
  <footer>
    <p><small>CopyRight&copy; Hikaru All Right Reserve.</small></p>
  </footer>

  <script src="{{ mix('js/base.js') }}" defer></script>
  @yield('import_file')
</body>
</html>

