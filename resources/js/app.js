require('./bootstrap');

window.Vue = require('vue');

// import Router from 'vue-router';

// Vue.use(Router);

// //Rutas
// let router = new Router({
//     routes: [{
//             path: '/',
//             component: {
//                 template: '<div>Este es el home</div>'
//             }
//         },
//         {
//             path: '/blog',
//             component: {
//                 template: '<div>Este es el blog</div>'
//             }
//         },
//         {
//             path: '/archivo',
//             component: {
//                 template: '<div>Este es el archivo</div>'
//             }
//         },
//         {
//             path: '/nosotros',
//             component: {
//                 template: '<div>Este es nosotros</div>'
//             }
//         },
//         {
//             path: '/contacto',
//             component: {
//                 template: '<div>Este es el contacto</div>'
//             }
//         }
//     ],
//     linkExactActiveClass: 'current'

// });

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    // router
});