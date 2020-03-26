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
  <link rel="stylesheet" href="{{mix('css/base.css')}}" defer>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ffcdbb6add.js" crossorigin="anonymous"></script>
</head>
<body>
  <div id="header">
    <p>header</p>
  </div>
  <div class="container">
    @yield('container')
  </div>
  <div id="footer">
    <p>footer</p>
  </div>

  <script src="{{ mix('js/base.js') }}" defer></script>
  @yield('import_file')
</body>

<style>
  .container {
    width:1000px;
    margin:0 auto;
  }
</style>
</html>

