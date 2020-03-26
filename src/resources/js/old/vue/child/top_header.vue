
<template>
    <div class="top-header">
        <img v-bind:src="header_img_src">
            <div id="header-title">
                <div id="title">
                    <h2>Recipe Sharing</h2>
                    <p>料理レシピ共有アプリ</p>
                </div>
                <a class="register-button" href="#">会員登録</a>
            </div>
    </div>
</template>

<style>
.top-header {
    position: relative;
}
.top-header img {
    width: 100%;
    height: 700px;
    opacity: 0.6;
}

#header-title {
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%,-50%);
    -webkit-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
    margin:0;
    padding:0;
    text-align: center;
}
#title {
    text-align: center;
    background-color: #EF866B;
    border-radius: 5px;
    padding: 5px 40px;
}

#header-title #title h2 {
    font-size: 6rem;
    text-align: center;
    margin: 0;
    color: white;
}

#header-title #title p {
    text-align: center;
    font-size: 2rem;
    color: white;
    margin: 0;
}

#header-title .register-button {
    text-align: center;
    display: inline-block;
    margin: 30px auto;
    font-size: 1.3rem;
    text-decoration: none;
    border-radius: 3px;
    font-weight: bold;
    color: #555555;
    padding: 0.5em 1em;
    background-color: #F7D76B;
    transition: 0.4s;
}
#header-title .register-button:hover {
    background-color: rgb(238, 224, 178);
}

</style>

<script>
import TopHeaderImg from '../../../img/top_header_img.jpg';
export default {
    data(){
        return {
            header_img_src:TopHeaderImg
        }
    }
}
</script>