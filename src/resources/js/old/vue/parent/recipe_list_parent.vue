
<template>
<div id="container">
    <div id="warapper_recipe_search">
        <recipe-search-form
            :category-array="categoryArray"
            :material-array="materialArray"
            :category-form-selected-items="categoryFormSelectedItems"
            :material-form-selected-items="materialFormSelectedItems"></recipe-search-form>
    </div>
    <div id='wrapper-recipe'>
        <h2>レシピ一覧 <i class="fas fa-list-alt"></i></h2>
        
        <div v-for="recipe in recipe_card_list" :key="recipe.recipe_id">
            <recipe-list 
            :recipe-id="recipe.recipe_id"
            :title="recipe.title" 
            :sentence="recipe.sentence"
            :user-name="recipe.user_name"
            :user-id="recipe.user_id"
            :category-list="recipe.category_list"
            :material-list="recipe.material_list"
            :favarit-count="recipe.favarit_num">
            </recipe-list>
        </div>
    </div>
</div>
</template>

<script>
import RecipeCard from '../child/recipe_card.vue';
import RecipeSearchForm from '../child/recipe_search_form.vue';

export default {
    data(){
        return {
            recipe_card_list : JSON.parse(this.recipeCardList),
        }
    },
    props:{
        recipeCardList:String,
        categoryArray:String,
        materialArray:String,
        categoryFormSelectedItems:String,
        materialFormSelectedItems:String,
    },
    components:{
        RecipeList:RecipeCard,
        RecipeSearchForm:RecipeSearchForm,
    },

}
</script>

<style>
    #container {
      display: flex;
      margin: 50px auto;
      width: 1000px;
    }
    #wrapper-recipe {
      width: 800px;
      border: solid 2px #BCB5B5;
      box-shadow: 0 0 8px #BCB5B5;
      border-radius: 13px;
    }
    #wrapper-recipe h2 {
      font-size: 1.5rem;
      color: white;
      margin-left: 20px;
      font-weight: bold;
      background-color: #EF866B;
      margin: 0;
      padding: 15px;
      border-radius: 10px 10px 0 0;
    }
</style>