
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./notify.min.js');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

Vue.component('main-template', require('./components/templates/main-template.vue'));

const routes = [ 
    {
        path: '/',
        component: require('./components/paginas/home.vue')
    },
    {
    	path: '/estado/:id',
    	component: require('./components/estados/estado.vue')
    },
    {
        path: '/admin/estados',
        component: require('./components/backend/estados/index.vue')
    }
]


const router = new VueRouter({
    routes
})

const app = new Vue({
    router
}).$mount('main-template');