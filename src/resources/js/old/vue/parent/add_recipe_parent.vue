
<template>
    <div id="container">
        <h2>レシピ追加</h2>

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
                <div class="category-chackbox" v-for="category in CategoryItemList" :key="category.id">
                    <input type="checkbox" name="category" id="category" value="category.id">{{category.category_name}}
                </div>
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
            <input type="hidden" name="title">
            <input type="hidden" name="title_image">
            <input type="hidden" name="category">
            <input type="hidden" name="description">
            <input type="submit" value="送信" v-on:click="onClickSubmitRecipeData">
        </form>
    </div>
</template>

<script>
export default {
    props:{
        JsonStrCategoryItemList:String,
    },
    data(){
        return {
            CategoryItemList:[]
        }
    },
    created(){
        if(this.JsonStrCategoryItemList.length > 0){
            this.CategoryItemList = JSON.parse(this.JsonStrCategoryItemList);
        }
    },
    methods: {
        onClickSubmitRecipeData:function(){
            var form = document.getElementById("submit-button-area");
            form.method = "post";
            form.title.value = "";
            form.title_image.value = "";
            form.category.value = "";
            form.description.value = "";
            form.action = "/recipes/add";
            form.submit();
        }
    },
}
</script>


<style>
    .form-item {
        display: block;
        overflow: hidden;
        margin-bottom: 10px;
    }
    .form-item .form-label {
        display: block;
        float: left;
        width: 200px;
        padding: 5px;
        margin:0;
    }
    #category-checkbox {
        display: block;
        float: left;
    }
</style>

