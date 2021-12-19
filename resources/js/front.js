require('./bootstrap');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import App from './components/App';
import router from './router';
import AOS from 'aos';
import 'aos/dist/aos.css';

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    mounted() {
        AOS.init()
      },
    }).$mount('#app');

