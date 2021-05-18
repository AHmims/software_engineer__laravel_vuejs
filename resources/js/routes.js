import A from './vue/views/products.vue';
import B from './vue/views/b.vue';

export let routes = [
    {
        path: '/', component: A, name: 'Products'
    },
    {
        path: '/x', component: B, name: 'Testing'
    }
]
