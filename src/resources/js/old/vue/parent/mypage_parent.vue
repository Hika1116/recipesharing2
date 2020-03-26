
<template>
    <div id="container">
        <h2>マイページ</h2>
        <p>ユーザー名:{{userName}}</p>
        <a href="/recipes/add">レシピ追加</a>
    </div>
</template>

<script>
export default {
    props:{
        userName:String,
    }
}
</script>

<style>
    
</style>