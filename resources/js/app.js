require('./bootstrap');

import Vue from 'vue';

import App from './vue/app.vue';

new Vue({
    el: "#app",
    components: { App }
});
