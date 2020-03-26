require('./bootstrap');

import Vue from 'vue'
import MypageParent from './vue/parent/mypage_parent.vue';

new Vue({
    el: '#app',
    components: {
        MypageParent: MypageParent,
    },
});