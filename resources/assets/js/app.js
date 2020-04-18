require('./bootstrap');

window.Vue = require('vue');



Vue.component('example-component', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});