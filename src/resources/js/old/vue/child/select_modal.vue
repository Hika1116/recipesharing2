<template>
    <div id="select-modal">
        <div id="content">
            <h3>{{title}}</h3>
            <button id="cancel-button" type="button" v-on:click="clickClose">×</button>
            <div id="select-area">
                <div class="choice-area">
                    <div class="input-text">
                        <input type="text" placeholder="カテゴリー名を入力" v-model="selectText">
                    </div>
                    <div class="table-area">
                        <table>
                            <thead>
                                <tr><th>カテゴリー</th></tr>
                            </thead>
                            <tbody>
                                <tr v-for="(element) in extractionSortData" :key="element.id">
                                    <td v-on:click="pushData(element.id)">{{element.data}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="selected-area">
                    <div class="dummy-class"></div>
                    <div class="table-area">
                        <table>
                            <thead>
                                <tr><th>選択済</th></tr>
                            </thead>
                            <tbody>
                                <tr v-for="(element) in selectSortData" :key="element.id">
                                    <td v-on:click="pullData(element.id)">{{element.data}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="select-button-area">
                <button type="button" v-on:click="clickChoiceItem">SELECT</button>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    data(){
        return {
            choiceList:[],
            selectedList:[],
            selectText:''
        }
    },
    created(){
        this.choiceList = JSON.parse(this.dataArray);
    },
    props:{
        title:String,
        dataArray:String,
    },
    methods:{
        clickClose:function(){
            // リストの初期化
            this.choiceList = JSON.parse(this.dataArray);
            this.selectedList = [];
            
            this.$emit('from-child');
        },
        pushData:function(id){
            var select = this.selectedList;
            this.choiceList.forEach(function(value){
                if(value.id === id){
                    select.push(value);
                }
            });
            this.choiceList = this.choiceList.filter(function(value){
                return value.id !== id;
            });
        },
        pullData:function(id){
            var choice = this.choiceList;
            this.selectedList.forEach(function(value){
                if(value.id === id){
                    choice.push(value);
                }
            });
            this.selectedList = this.selectedList.filter(function(value){
                return value.id !== id;
            });
        },
        clickChoiceItem:function(){
            this.$emit('from-child-in-select-item',this.selectedList);
        }
    },
    computed:{
        extractionSortData(){
            var text = this.selectText;
            var re = new RegExp(this.selectText);
            var extractiondata = this.choiceList.filter(function(value){
                return re.test(value.data);
            });

            return extractiondata.sort((a,b)=>{
                return a.id - b.id;
            });
        },
        selectSortData(){
            return this.selectedList.sort((a,b)=>{
                return a.id - b.id;
            });
        }
    },
}
</script>

<style>
    #select-button-area {
        display: flex;
        justify-content: center;
        height: 10%;
    }
    #select-button-area button {
        display: inline-block;
        width: 20%;
        height: 100%;
        text-align: center;
        font-size: 14px;
        color: #FFF;
        text-decoration: none;
        font-weight: bold;
        border-radius: 4px;
        background-image: linear-gradient(-90deg, #EF866B, #F7D76B);
        transition: .5s;
        background-size: 200%;
    }
    #select-button-area button:hover {
        background-position: right center;
    }
    #select-button-area button:focus { outline:0; }

    #select-modal {
        /*　要素を重ねた時の順番　*/
        z-index:1;

        /*　画面全体を覆う設定　*/
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background-color:rgba(0,0,0,0.5);

        /*　画面の中央に要素を表示させる設定　*/
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #content{
        z-index:2;
        width:50%;
        height: 50%;
        padding: 1em;
        background:#fff;
        position: relative;
    }
    #content h3 {
        text-align: center;
        margin: 10px 0;
    }
    #select-area{
        display: flex;
        justify-content: center;
        margin: 0 auto;
        width: 100%;
        height: 80%;
    }
    .choice-button-area {
        display: flex;
        justify-content: flex-end;
    }
    .choice-button-area button {
        margin-right: 20px;
        height: 100%;
    }
    .dummy-class {
        height: 45px;
    }
    .choice-area, .selected-area {
        width: 40%;
        margin: 10px 30px;
        position: relative;
    }
    .table-area {
        width: 100%;
        border: solid 3px #eee;
        height: 80%;
    }
    .table-area table {
        border-collapse: collapse;
        border-spacing: 0;
        margin: 0;
        width: 100%;
        height: 100%;
    }

    .table-area table thead, tbody {
        display: block;
    }
    .table-area table tr{
        border-bottom: solid 1px #eee;
        line-height: 50px;
        cursor: pointer;
        margin:0;
        display: block;
        width: 100%;
    }
    .table-area table th, td {
        text-align: center;
        display: block;
        max-height: 80px;
        width: 100%;
    }

    
    .table-area table tbody {
        overflow-x: hidden;
        overflow-y: scroll;
        display: block;
        height: 80%;
    }
    .table-area table thead {
        background-color: #EF866B;
        color: white;
        height: 20%;
    }
    .table-area table thead tr {
        display: block;
        cursor: default;
        height: 100%;
    }

    
    
    .table-area table tbody tr:hover{
        background-color: #d4f0fd;
    }



    
    #cancel-button {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 30px;
        height: 30px;
        font-size: 1rem;

        display: inline-block;
        text-decoration: none;
        background: #BCB5B5;
        color: #FFF;
        border-radius: 50%;
        text-align: center;
        overflow: hidden;
        transition: .4s;
    }
    #cancel-button:hover {
        background: rgb(245, 242, 242);
    }
    .input-text {
        width: 100%;
        height: 35px;
        margin: 5px 3px;
    }
    .input-text input[type=text] {
        box-sizing: border-box;
        line-height: 35px;
        font-size: 15pt;
        width: 100%;
        height: 100%;
        margin: 3px 0;
        transition: 0.3s;
        border: 3px solid #F7B46B;
        border-radius: 4px;
        outline: none;
    }
    .input-text input[type=text]:focus {
        border-color: #da3c41;
    }
    
    
</style>

