<template>
<div>
    <div id="top-sentence">
        <p class='sentence-title'>Recipe Sharingとは？</p>
        <div id="top-sentence-text">
            <p>
                あなたの得意な肉じゃがの作り方、<br>
                あの人の得意なビーフシチューの作り方、<br>
                みんなの得意な料理のレシピを知ることができたら料理がもっと楽しくなる。<br>
                <span>RecipeSharing</span>はそんなみんなの得意料理を共有する料理レシピ共有サービスです。
            </p>
        </div>
    </div>
    <div id='top-sentence-detail'>
        <p class='sentence-title'>Recipe Sharingの機能</p>
        <detail-article :functionHeader="post_function_detail_header" :functionImage="PostFunctionImg">
            <template v-slot:function-detail>
                <p>
                    あなたの得意なレシピを紹介文を添えて投稿できます。<br>
                    投稿する内容は、レシプで使用する材料や作り方の手順となります。<br>
                    画像を添付して、わかりやすいレシピの投稿も可能です。
                </p>
            </template>
        </detail-article>
        <detail-article :functionHeader="search_function_detail_header" :functionImage="SearchFunctionImg">
            <template v-slot:function-detail>
                <p>
                    みんなのレシピの検索が簡単にできます。<br>
                    「夕飯」や「肉料理」などのカテゴリーの指定や<br>
                    冷蔵庫にある材料を指定するなど、様々な条件でも検索ができます。
                </p>
            </template>
        </detail-article>
        <detail-article :functionHeader="favarit_function_detail_header" :functionImage="FavaritFunctionImg">
            <template v-slot:function-detail>
                <p>
                    お気に入りのレシピを保存することができます。<br>
                    保存したお気に入りのレシピはマイページでいつでも確認ができます。<br>
                    また、自分が投稿したレシピがどれくらいお気に入りされたかも見ることができます。
                </p>
            </template>
        </detail-article>
    </div>
</div>
    
</template>

<script>
import DetailArticle from '../child/detail_article.vue';
import PostFunctionImg from '../../../img/post_function_img.jpg'
import SearchFunctionImg from '../../../img/search_function_img.jpg'
import FavaritFunctionImg from '../../../img/favarit_fanction_img.jpg'

export default {
    components: {
        DetailArticle: DetailArticle,
    },
    data(){
        return {
            post_function_detail_header:'レシピ投稿機能',
            search_function_detail_header:'レシピ検索機能',
            favarit_function_detail_header:'お気に入り機能',
            PostFunctionImg:PostFunctionImg,
            SearchFunctionImg:SearchFunctionImg,
            FavaritFunctionImg:FavaritFunctionImg,
        }
    }
}
</script>

<style>
#top-sentence {
    text-align: center;
}
.sentence-title {
    font-size: 2rem;
    color: #EF866B;
    font-weight:bold;
}

#top-sentence-text {
    text-align: center;
    background-color:#F7B46B;
    margin: 50px;
    padding: 10px 80px;
    border-radius: 10px;
}
#top-sentence-text p {
    color: white;
    display: inline-block;
    text-align: left;
    font-size: 1.3rem;
    line-height: 2;
}
#top-sentence-text p span {
    font-weight: bold;
}
#top-sentence-detail {
    text-align: center;
}
</style>