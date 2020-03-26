<template>
    <header>
        <div class="title">
            <h2>Recipe Sharing</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a v-bind:href="mypageUrl">Hikaru</a></li>
                <li>|</li>
                <li><a href="#">LogOut</a></li>
            </ul>
        </div>
    </header>
</template>

<script>
export default {
    data(){
        return {
            mypageUrl:'/user/' + 1,
        }
    }
}
</script>

<style>
    header {
        display: flex;
        width: 100%;
        height: 60px; 
        text-align: center;
        background-color: #BCB5B5;
    }

    .title {
        display: flex;
        align-items: center;
        width: 400px;
        margin-left: 30px;
    }
    .title h2 {
        display: block;
        margin: 0;
        color: white;
    }
    .menu {
        display: flex;
        width: calc(100vw - 400px);
        justify-content: flex-end;
        margin: 0;
    }
    .menu ul {
        display: flex;
        align-items: center;
        list-style: none;
        margin-right: 30px;
    }
    .menu ul li {
        margin-right: 20px;
        color: white;
    }
    .menu ul li a {
        color: white;
        text-decoration: none;
    }
    .menu ul li a:hover {
        opacity: 0.6;
    }
    
    
</style>
