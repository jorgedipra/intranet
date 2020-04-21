require('./bootstrap');

window.Vue = require('vue');
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'

library.add(faUserSecret, fas, fab)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false

Vue.component('home-component', require('./components/HomeComponent.vue'));
Vue.component('tareas-components', require('./components/notas/IndexComponent.vue'));
Vue.component('cardpresent-components', require('./components/web/CardPresentComponent.vue'));
Vue.component('cardfrase-components', require('./components/web/CardFraseComponent.vue'));
Vue.component('cardcarrucel-components', require('./components/web/CardCarrucelComponent.vue'));

const app = new Vue({
    el: '#app'
});