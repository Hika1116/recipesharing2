 @extends('base')
 @section('title')
  Introduce
 @endsection
 @section('container')

  <script src="{{ mix('js/introduce.js') }}" defer></script>
     <div>
       <div id="warapper">
        <top-header></top-header>
        <top-sentence></top-sentence>
       </div>
       <!-- <a><a href="{{route('recipes')}}">リスト一覧へ</a></p> -->
     </div>
 @endsection