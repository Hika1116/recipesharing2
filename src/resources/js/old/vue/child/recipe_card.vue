<template>
    <div id="recipe-card">
        <div id="recipe-card-img">
            <img :src="Image" alt="card-img">
        </div>
        <div id='recipe-card-detail'>
            <h3>{{title}}</h3>
            <hr>
            <div id='username-and-favaritcount'>
                <p id="user-name">by <a href="#">{{userName}}</a></p>
                <p id="favarit-count"><span>★</span>{{favaritCount}}</p>
            </div>
            <div id="category-tag-area">
                <p v-for="category in categoryList" :key="category">
                    <a href='/introduce'>{{category}}</a>
                </p>
            </div>
            <p id="recipe-context">
                {{sentence}}
            </p>
            <div id="mategial-area">
                <p>材料: {{materialList}}</p>
            </div>
            <div id="favarit-botton-area">
                <span id="favarit-star">★</span><a id="favarit-text" href="#">お気に入り</a>
            </div> 
        </div>
    </div>
</template>

<script>
import Image from '../../../img/favarit_fanction_img.jpg';

export default {
    props:{
        recipeId:Number,
        title:String,
        sentence:String,
        userName:String,
        userId:Number,
        categoryList:Array,
        materialList:String,
        favaritCount:Number,
    },
    data(){
        return {
            Image:Image,
        }
    }
}
</script>

<style>
    #recipe-card {
        display: flex;
        width: 600px;
        padding: 20px 50px;
        border: solid 2px #BCB5B5;
        border-radius: 10px;
        margin: 20px auto;
        box-shadow: 0 0 3px #BCB5B5;
    }
    #recipe-card-img {
        width: 300px;
        position: relative;
        margin-right:20px; 
         border: 1px solid #BCB5B5;
    }
    #recipe-card-img img {
        position: absolute;
        margin: auto;
        width:auto;
        height:auto;
        max-width:100%;
        max-height:100%;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;

    }
    #recipe-card-detail {
        width: 100%;
        display: block;
    }
    #recipe-card-detail h3 {
        color: #BCB5B5;
        margin: 0;
        font-size: 1.5rem;
    }
    #recipe-card-detail hr {
        margin: 0;
    }

    #username-and-favaritcount {
        display: flex;
        font-size: .8rem;
        color: #BCB5B5;
    }
    #user-name {
        margin: 3px 0;
    }
    #user-name a{
        color: #BCB5B5;
    }
    #favarit-count {
        margin: 3px 30px;
    }
    #favarit-count span {
        color: #F7B46B;
    }


    #category-tag-area {
        display: flex;
        padding:0;
        margin:5px 0 0 0;
    }
    #category-tag-area p {
        margin: 0 10px 0 0;
        background-color: #BCB5B5;
        border-radius: 10px;
    }
    #category-tag-area p:hover {
        opacity: 0.8;
    }
    #category-tag-area p a {
        font-size: .8rem;
        text-decoration: none;
        color: white;
        margin: 3px 5px;
    }

    #recipe-context {
        color: #BCB5B5;
    }
    #mategial-area p {
        color: #BCB5B5;
    }
    
    #favarit-botton-area {
        display: inline-block;
        margin: 0;
        padding: 0;
        font-size: .8rem;
        border: solid 1px #BCB5B5;
        background-color: #F7B46B;
        border-radius: 10px;
    }
    #favarit-botton-area:hover {
        opacity: 0.8;
    }
    #favarit-star {
        display: inline-block;
        color: white;
        margin: 0;
        padding: 1px 5px;
        border-radius: 10px 0 0 10px;
    }
    #favarit-text {
        display: inline-block;
        background: white;
        color: #F7B46B;
        text-decoration: none;
        border-radius: 0 10px 10px 0;
        margin: 0;
        padding: 1px 10px;
    }
</style>