<template>
    <div id='detail-article'>
        <div id="detail-sentence">
            <h3>{{functionHeader}}</h3>
            <hr>
            <slot name="function-detail"></slot>
        </div>
        <img :src="imgPath" alt="detail article img">
    </div>
</template>

<script>
export default {
    props:{
        functionHeader:String,
        functionImage:String,
    },
    data(){
        return {
            imgPath:this.functionImage,
        }
    },
}
</script>

<style>
#detail-article {
    display: flex;
    margin: 20px auto;
    max-width: 1000px;
    border-radius: 10px;
    padding: 50px;
    box-shadow: 0 0 8px gray;
    
}
#detail-sentence {
    margin-right: 40px;
}
#detail-sentence h3 {
    margin: 0;
    color: #BCB5B5;
    margin-right: 20px;
}
#detail-sentence hr {
    color: #BCB5B5;
}
#detail-sentence p {
    color: #BCB5B5;
    text-align: left;
}

#detail-article img {
    width: 500px;
    height: 300px;
}
</style>