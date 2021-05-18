require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

import App from './vue/newApp.vue';
import { routes } from './routes.js';

Vue.use(VueRouter);

new Vue({
    el: "#app",
    components: { App },
    router: new VueRouter({
        routes
    })
});
