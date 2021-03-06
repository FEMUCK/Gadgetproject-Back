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
Vue.component('member-login', require('./components/member/Login.vue').default);

const routes = [

      { path: '/admin', component: require('./components/Dashboard.vue').default,
      beforeEnter: (to, from, next) => {
        if(localStorage.getItem('login')){
          next()
        }
        else{
          router.push('/');
        }  
      },
      children: [
        { 
          path: 'dashboard', component: require('./components/Blank.vue').default,
        },
        { 
          path: 'category', component: require('./components/category/CategoryList.vue').default,
        },
        { 
          path: 'category/create', component: require('./components/category/CategoryCreate.vue').default,
        },
        { 
          path: 'category/:id/edit', component: require('./components/category/CategoryEdit.vue').default,
        },
        { 
          path: 'sub-category', component: require('./components/subcategory/SubCategoryList.vue').default,
        },
        { 
          path: 'sub-category/create', component: require('./components/subcategory/SubCategoryCreate.vue').default,
        },
        { 
          path: 'sub-category/:id/edit', component: require('./components/subcategory/SubCategoryEdit.vue').default,
        },
        { 
          path: 'member', component: require('./components/member/MemberList.vue').default,
        },
        { 
          path: 'member/:id/edit', component: require('./components/member/MemberEdit.vue').default,
        },
        { 
          path: 'product', component: require('./components/product/ProductList.vue').default,
        },
        { 
          path: 'product/create', component: require('./components/product/ProductCreate.vue').default,
        },
        { 
          path: 'product/:id/edit', component: require('./components/product/ProductEdit.vue').default,
        },
        { 
          path: 'carousel', component: require('./components/carousel/CarouselList.vue').default,
        },
        { 
          path: 'carousel/create', component: require('./components/carousel/CarouselCreate.vue').default,
        },
        { 
          path: 'carousel/:id/edit', component: require('./components/carousel/CarouselEdit.vue').default,
        },
        { 
          path: 'banner', component: require('./components/banner/BannerList.vue').default,
        },
        { 
          path: 'banner/:id/edit', component: require('./components/banner/BannerEdit.vue').default,
        },
      ]
    },

    { 
      path: '/', component: require('./components/member/Login.vue').default,
      beforeEnter: (to, from, next) => {
        if(localStorage.getItem('login')){
          router.push('/dashboard');
        }
        else{
          next();
        }  
      },
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
