/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueRouter from 'vue-router'
window.Vue = require('vue');
Vue.use(VueRouter)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('dashboard', require('./components/Dashboard.vue').default);
Vue.component('image-upload', require('./components/image/imageUpload.vue').default);

const routes = [
    { 
      path: '/', component: require('./components/Dashboard.vue').default,
    },
    { 
      path: '/category', component: require('./components/category/CategoryList.vue').default,
    },
    { 
      path: '/category/create', component: require('./components/category/CategoryCreate.vue').default,
    },
    { 
      path: '/category/:id/edit', component: require('./components/category/CategoryEdit.vue').default,
    },
    { 
      path: '/member', component: require('./components/member/MemberList.vue').default,
    },
    { 
      path: '/member/:id/edit', component: require('./components/member/MemberEdit.vue').default,
    },
    { 
      path: '/product', component: require('./components/product/ProductList.vue').default,
    },
    { 
      path: '/product/create', component: require('./components/product/ProductCreate.vue').default,
    },
    { 
      path: '/product/:id/edit', component: require('./components/product/ProductEdit.vue').default,
    },
  ]

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    routes ,
  })

const app = new Vue({
    el: '#app',
    router
});
