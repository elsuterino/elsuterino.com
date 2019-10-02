require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueMeta from 'vue-meta';
import router from './routes';
require('./fontawesome');

Vue.use(VueRouter);
Vue.use(VueMeta, {
    // optional pluginOptions
    refreshOnceOnNavigation: true
});

Vue.component('v-navbar', require('./layout/Navbar').default);
Vue.component('v-contact-form', require('./components/ContactForm').default);
Vue.component('v-wave', require('./components/Wave').default);
Vue.component('v-piggie', require('./components/Piggie').default);

const app = new Vue({
    router,
    el: '#app'
});

// require('./bulma-extensions');
