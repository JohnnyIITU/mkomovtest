require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios'

import VueAxios from 'vue-axios'

import Vue from "vue";

Vue.use(VueAxios, axios);

Vue.component('site-menu', require('./components/Menu.vue').default);
Vue.component('latest', require('./components/Latest.vue').default);
Vue.component('post-card', require('./components/Card.vue').default);
Vue.component('paginate', require('./components/Paginate.vue').default);
Vue.component('post', require('./components/Post.vue').default);
window.onload = function(){
    var app = new Vue({
        el: '#app',
    });
};
