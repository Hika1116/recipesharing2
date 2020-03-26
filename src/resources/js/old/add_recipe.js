require('./bootstrap');

import Vue from 'vue'
import AddRecipeParent from './vue/parent/add_recipe_parent.vue';

new Vue({
    el: '#app',
    components: {
        AddRecipeParent: AddRecipeParent,
    },
    data:{
        testStr:"test",
    }
});