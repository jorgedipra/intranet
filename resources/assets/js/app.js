require('./bootstrap');

window.Vue = require('vue');



Vue.component('home-component', require('./components/HomeComponent.vue'));
Vue.component('tareas-components', require('./components/notas/IndexComponent.vue'));

const app = new Vue({
    el: '#app'
});