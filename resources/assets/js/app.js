require('./bootstrap');

window.Vue = require('vue');
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'

import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap and BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

library.add(faUserSecret, fas, fab)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false

Vue.component('home-component', require('./components/HomeComponent.vue'));
Vue.component('tareas-components', require('./components/notas/IndexComponent.vue'));
Vue.component('cardpresent-components', require('./components/web/CardPresentComponent.vue'));
Vue.component('cardfrase-components', require('./components/web/CardFraseComponent.vue'));
Vue.component('cardcarrucel-components', require('./components/web/CardCarrucelComponent.vue'));

Vue.component('tablepage-components', require('./components/pageWeb/TablePageComponent.vue'));

const app = new Vue({
    el: '#app'
});