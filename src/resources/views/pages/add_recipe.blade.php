@extends('base')
 @section('title')
 レシピ追加
 @endsection

@section('container')
<div id="app">
    {{testStr}}
{{-- 親コンポーネント --}}
{{-- <add-recipe-parent json-str-category-item-list='{{$category_item_list}}'></add-recipe-parent> --}}
    <div class="form-item">
        <label class="form-label" for="title">タイトル</label>
        <input type="text" id="title">
    </div>
    <div class="form-item">
        <label class="form-label" for="title-img">レシピ画像</label>
        <input type="file" id="title-img">
    </div>
    <div class="form-item">
        <label class="form-label" for="category">カテゴリー</label>
        <div id="category-checkbox">
            {{-- <div class="category-chackbox" v-for="category in CategoryItemList" :key="category.id">
                <input type="checkbox" name="category" id="category" value="category.id">{{category.category_name}}
            </div> --}}
        </div>
    </div>
    <div class="form-item">
        <label class="form-label" for="description">レシピ紹介文</label>
        <textarea  id="description" name="description"></textarea>
    </div>
    <div class="form-item">
        <label class="form-label" for="material">材料</label>
        <input type="text" id="material" placeholder="後回し">
    </div>
    <div class="form-item">
        <label class="form-label" for="how-to-make">作り方</label>
        <input type="text" id="how-to-make" placeholder="後回し">
    </div>

    <form id="submit-button-area" action="#" method="POST">
        @csrf
        <input type="hidden" name="title">
        <input type="hidden" name="title_image">
        <input type="hidden" name="category">
        <input type="hidden" name="description">
        <input type="submit" value="送信" onclick="btnClick(this)">
    </form>

</div>

<script src="{{ mix('js/add_recipe.js') }}" defer></script>
<script>
    function btnClick(obj){
    var form = document.getElementById("submit-button-area");
        form.method = "post";
        form.title.value = "";
        form.title_image.value = "";
        form.category.value = "";
        form.description.value = "";
        form.action = "/recipes/add";
        form.submit();
}
</script>
 @endsection