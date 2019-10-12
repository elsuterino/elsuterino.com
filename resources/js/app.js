// require('./bootstrap');
require('./fontawesome');

import Vue from 'vue';
import VueMeta from 'vue-meta';
import { InertiaApp } from '@inertiajs/inertia-vue';
import Buefy from 'buefy'

Vue.use(Buefy, {
    defaultIconComponent: 'font-awesome-icon',
    defaultIconPack: 'fas',
});

Vue.use(InertiaApp);

Vue.use(VueMeta, {
    refreshOnceOnNavigation: true
});

const app = document.getElementById('app');

new Vue({
    render: h => h(InertiaApp, {
        props: {
            initialPage: JSON.parse(app.dataset.page),
            resolveComponent: name => import(`./Pages/${name}`).then(module => module.default)
        },
    }),
}).$mount(app);

// require('./bulma-extensions');
