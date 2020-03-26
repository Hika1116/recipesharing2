<template>
    <div id="recipe_search_form">
        <h2>検索条件</h2>
        <div id="form-area">
            <div class="select-title-area">
                <p>タイトル</p>
                <input type="text" v-model="titleContext" name="title" placeholder="タイトルを入力">
            </div>

            <div class="select-area">
                <div class="select-item-header">
                    <p>カテゴリー</p>
                    <div class="button-area">
                        <button type="button" v-on:click="onClickIsCategoryModalShow">{{categorySelectText}}</button>
                    </div>
                </div>
                <div class="selected-item" v-show="isSelectedCategoryItem">
                    <p v-for="element in categorySelectedItemList" :key="element.id">{{element.data}}</p>
                </div>
            </div>
            
            <div class="select-area">
                <div class="select-item-header">
                    <p>材料</p>
                    <div class="button-area">
                        <button type="button" v-on:click="onClickIsMaterialModalShow">{{materialSelectText}}</button>
                    </div>
                </div>
                <div class="selected-item" v-show="isSelectedMaterialItem">
                    <p v-for="element in materialSelectedItemList" :key="element.id">{{element.data}}</p>
                </div>
            </div>
            <form id="submit-button-area" method="GET" action="/recipes/search" onsubmit="return false;">
                <input type="hidden" name="title">
                <input type="hidden" name="category">
                <input type="hidden" name="material">
                <button type="button" v-on:click="onSubmitSearchRecipe">検索</button>
            </form>
        </div>

        <!-- 選択用モーダル -->
        <!-- カテゴリー -->
        <select-modal
                :title="modalCategoryTitle" 
                :data-array="categoryArray" 
                v-show="isCategoryModalShow" 
                v-on:from-child="closeModal"
                v-on:from-child-in-select-item="getCategorySelectItem"></select-modal>
        <!-- 材料 -->
        <select-modal
                :title="modalMaterialTitle" 
                :data-array="materialArray" 
                v-show="isMateriakModalShow" 
                v-on:from-child="closeModal"
                v-on:from-child-in-select-item="getMaterialSelectItem"></select-modal>
    </div>
</template>

<script>
import SelectModal from './select_modal.vue';

export default {
    components:{
        SelectModal:SelectModal,
    },
    props:{
        categoryArray:String,
        materialArray:String,
        categoryFormSelectedItems:String,
        materialFormSelectedItems:String,
    },
    data(){
        return {
            titleContext:"",
            isCategoryModalShow:false,
            isMateriakModalShow:false,
            modalCategoryTitle:"カテゴリー",
            modalMaterialTitle:'材料',
            categorySelectedItemList:[],
            materialSelectedItemList:[],
            selectTitle: function(){
                return "選択";
            }
        }
    },
    created(){
        if(this.categoryFormSelectedItems.length > 0){
            this.categorySelectedItemList = JSON.parse(this.categoryFormSelectedItems);
        }
        if(this.materialFormSelectedItems.length > 0){
            this.materialSelectedItemList = JSON.parse(this.materialFormSelectedItems);
        }
    },
    computed:{
        categorySelectText(){
            if(this.categorySelectedItemList.length > 0){
                return "選択";
            }
            return "未選択";
        },
        materialSelectText(){
            if(this.materialSelectedItemList.length > 0){
                return "選択";
            }
            return "未選択";
        },
        isSelectedCategoryItem(){
            
            return this.categorySelectedItemList.length > 0;
        },
        isSelectedMaterialItem(){
            return this.materialSelectedItemList.length > 0;
        }
    },
    methods:{
        onClickIsCategoryModalShow:function(){
            this.isCategoryModalShow = true;
        },
        onClickIsMaterialModalShow:function(){
            this.isMateriakModalShow = true;
        },
        closeModal: function(name){
            //ここで子コンポーネントのイベント発火もわかる
            this.isCategoryModalShow = false;
            this.isMateriakModalShow = false;
        },
        getCategorySelectItem:function(resultArray){
            this.isCategoryModalShow = false;
            this.categorySelectedItemList = resultArray;
        },
        getMaterialSelectItem:function(resultArray){
            this.isMateriakModalShow = false;
            this.materialSelectedItemList = resultArray;
        },
        onSubmitSearchRecipe:function(){
            var form = document.getElementById("submit-button-area");
            form.method = "get";
            form.title.value = this.titleContext;
            console.log(this.categorySelectedItemList);

            form.category.value = JSON.stringify(this.categorySelectedItemList);
            form.material.value = JSON.stringify(this.materialSelectedItemList);
            form.action = "/recipes/search";
            form.submit();
        }
    }
}

var createXMLHttpRequest = function createXMLHttpRequest() {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    try {
      return new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        return new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e2) {
        return null;
      }
    }
  } else {
    return null;
  }
};
</script>

<style>
.select-item-header p span {
    background-color: #F7B46B;
    border-radius: 50%;
    font-size: 12pt;
    color: white;
    padding: 3pt;
}
#submit-button-area {
    display: flex;
    justify-content: center;
    height: 10%;
    margin: 20px 0;
}

#submit-button-area button {
    display: block;
	position: relative;
    border-radius: 10px;
	width: 65%;
    max-width: 300px;
	text-align: center;
	text-decoration: none;
    font-size: 1rem;
	color:white;
	background: #F7B46B;
    margin: 0;
    padding: 2px 10px;
    height: 100%;
    max-height: 40px;
}
#submit-button-area button:hover {
    opacity:0.8;
	cursor: pointer;
	text-decoration: none;
}
#submit-button-area button:focus{
    outline:0;
}
#recipe_search_form {
    width: 250px;
    height: auto;
    box-shadow: 0 0 3px #BCB5B5;
    margin: 0 20px;
    border-radius: 13px;
    border: solid 2px #BCB5B5;
}

#recipe_search_form h2 {
    font-size: 1.5rem;
      color: white;
      margin-left: 20px;
      font-weight: bold;
      background-color: #F7B46B;
      margin: 0;
      padding: 15px;
      border-radius: 10px 10px 0 0;
}
#recipe_search_form #form-area {
    height: 85%;
}

#form-area p {
    margin: 3px 3px;
    color: #BCB5B5;
    width: 50%;
    font-size: 1rem;
    font-weight: bold;
}
.select-title-area {
    height: 20%;
    max-height: 60px;
    margin: 20px 0;
}
.select-title-area input[type='text']{
    margin: 3px 3px;
    width: 80%;
    max-width: 300px;
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #BCB5B5;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    font-size: 1rem;
    color: #BCB5B5;
}
.select-area {
    margin: 15px 0;
    height: 25%;
}
.select-item-header {
    display: flex;
    position: relative;
}
.select-item-header .button-area button {
    display: block;
	position: relative;
    border-radius: 10px;
	width: auto;
    max-width: 80px;
	text-align: center;
	text-decoration: none;
	color:white;
	background: #BCB5B5;
    margin-right: 20px;
    font-size: .8rem;
}
.select-item-header .button-area button:hover {
    opacity:0.8;
	cursor: pointer;
	text-decoration: none;
}
.select-item-header .button-area button:focus{
    outline:0;
}
.button-area {
    display: flex;
    justify-content: flex-end;
    width: 50%;
}
#form-area .select-area .selected-item {
    border: solid 1px #BCB5B5;
    margin: 3px 3px;
    width: 90%;
    max-width: 500px;
    height: 40%;
    min-height: 70px;
    max-height: 100px;
    display: flex;
    flex-wrap: wrap;
    padding: 5px 3px;

    overflow-y: scroll;
}

#form-area .select-area .selected-item p {
    display: block;
    border-radius: 10px;
	color:white;
	background: #EF866B;
    font-size: .8;
    width: auto;
    text-align: center;
    height: 25px;
    padding: 1px 5px;
    margin: 1px;
    font-weight: normal;
}
</style>