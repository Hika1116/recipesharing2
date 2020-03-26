@extends('base')
 @section('title')
  マイページ
 @endsection

 @section('container')
  <script src="{{ mix('js/mypage.js') }}" defer></script>
  <div id="app">
  <mypage-parent user-name='{{$user_name}}'></mypage-parent>
  </div>
 @endsection