require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueMeta from 'vue-meta';

import router from './routes';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faFilePdf, faDatabase, faStar, faEnvelope, faPhone, faGlobe } from '@fortawesome/free-solid-svg-icons';
import {
    faPhp, faJs, faHtml5, faCss3Alt, faUbuntu, faVuejs, faSymfony, faWordpress, faLaravel, faDocker, faGithub,
    faLinkedin, faSkype
} from '@fortawesome/free-brands-svg-icons';

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(
    faFilePdf, faDatabase, faPhp, faJs, faHtml5, faCss3Alt, faUbuntu, faVuejs, faSymfony, faWordpress,
    faLaravel, faDocker, faStar, faGithub, faLinkedin, faEnvelope, faPhone, faGlobe, faSkype
);

Vue.use(VueRouter);
Vue.use(VueMeta, {
    // optional pluginOptions
    refreshOnceOnNavigation: true
});

Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('v-navbar', require('./layout/Navbar').default);
Vue.component('v-contact-form', require('./components/ContactForm').default);

const app = new Vue({
    router,
    el: '#app'
});

// require('./bulma-extensions');
