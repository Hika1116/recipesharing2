require('./bootstrap');

import Vue from 'vue'

import TopHeader from './vue/child/top_header.vue';
import TopSentence from './vue/child/top_sentence_1.vue';

new Vue({
    el: '#warapper',
    components: {
        TopHeader: TopHeader,
        TopSentence:TopSentence,
    },
})