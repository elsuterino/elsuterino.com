import VueRouter from 'vue-router';

import Portfolio from './views/Portfolio';
import About from './views/About';
import Skills from './views/Skills';
import Contact from './views/Contact';
import Experience from "./views/Experience";
import Cheatsheet from "./views/Cheatsheet";

export default new VueRouter({
    mode: 'history',
    linkActiveClass: 'is-active',
    // scrollBehavior(to, from, savedPosition) {
    //     return {x: 0, y: 0}
    // },
    routes: [
        {
            path: '*',
            redirect: '/404'
        },
        {
            path: '/portfolio',
            component: Portfolio,
            name: 'portfolio'
        },
        {
            path: '/',
            component: About,
            name: 'about'
        },
        {
            path: '/experience',
            component: Experience,
            name: 'experience'
        },
        {
            path: '/skills',
            component: Skills,
            name: 'skills'
        },
        {
            path: '/contact',
            component: Contact,
            name: 'contact'
        },
        {
            path: '/cheatsheet',
            component: Cheatsheet,
            name: 'cheatsheet'
        },
        // {
        //     path: '',
        //     component: Home,
        //     name: 'home',
        //     meta: {
        //         title: 'Home Page - Inetvi quality Webapp creating company',
        //         metaTags: [
        //             {
        //                 name: 'description',
        //                 content: 'The home page of our example app.'
        //             },
        //             {
        //                 property: 'og:description',
        //                 content: 'The home page of our example app.'
        //             }
        //         ],
        //         heroTitle: "All website development and programming services",
        //         heroSubtitle: "Idea, Structure and Design"
        //     }
        // },
        // {
        //     path: 'about',
        //     component: About,
        //     name: 'about',
        //     meta: {
        //         title: 'About - Inetvi quality Webapp creating company',
        //         metaTags: [
        //             {
        //                 name: 'description',
        //                 content: 'The home page of our example app.'
        //             },
        //             {
        //                 property: 'og:description',
        //                 content: 'The home page of our example app.'
        //             }
        //         ],
        //         heroTitle: "All website development and programming services",
        //         heroSubtitle: "Idea, Structure and Design"
        //     }
        // },
        // {
        //     path: 'portfolio',
        //     component: Portfolio,
        //     name: 'portfolio',
        //     meta: {
        //         title: 'Portfolio - Inetvi quality Webapp creating company',
        //         metaTags: [
        //             {
        //                 name: 'description',
        //                 content: 'The home page of our example app.'
        //             },
        //             {
        //                 property: 'og:description',
        //                 content: 'The home page of our example app.'
        //             }
        //         ],
        //         heroTitle: "All website development and programming services",
        //         heroSubtitle: "Idea, Structure and Design"
        //     }
        // },
        // {
        //     path: 'project/dolardeverdad',
        //     component: Project,
        //     name: 'project.dolardeverdad',
        //     props: {id: 'dolardeverdad'},
        //     meta: {
        //         title: 'Project DolarDeverdad - Inetvi quality Webapp creating company',
        //         metaTags: [
        //             {
        //                 name: 'description',
        //                 content: 'The home page of our example app.'
        //             },
        //             {
        //                 property: 'og:description',
        //                 content: 'The home page of our example app.'
        //             }
        //         ],
        //         heroTitle: "All website development and programming services",
        //         heroSubtitle: "Idea, Structure and Design"
        //     }
        // },
        // {
        //     path: 'project/currencyexchanges',
        //     component: Project,
        //     name: 'project.currencyexchanges',
        //     props: {id: 'currencyexchanges'},
        //     meta: {
        //         title: 'Project CurrencyExchangesToday - Inetvi quality Webapp creating company',
        //         metaTags: [
        //             {
        //                 name: 'description',
        //                 content: 'The home page of our example app.'
        //             },
        //             {
        //                 property: 'og:description',
        //                 content: 'The home page of our example app.'
        //             }
        //         ],
        //         heroTitle: "All website development and programming services",
        //         heroSubtitle: "Idea, Structure and Design"
        //     }
        // },
        // {
        //     path: 'services',
        //     component: Services,
        //     name: 'services',
        //     meta: {
        //         title: 'Services - Inetvi quality Webapp creating company',
        //         metaTags: [
        //             {
        //                 name: 'description',
        //                 content: 'The home page of our example app.'
        //             },
        //             {
        //                 property: 'og:description',
        //                 content: 'The home page of our example app.'
        //             }
        //         ],
        //         heroTitle: "All website development and programming services",
        //         heroSubtitle: "Idea, Structure and Design"
        //     }
        // },
        // {
        //     path: 'contact',
        //     component: Contact,
        //     name: 'contact',
        //     meta: {
        //         title: 'Contact Us! - Inetvi quality Webapp creating company',
        //         metaTags: [
        //             {
        //                 name: 'description',
        //                 content: 'The home page of our example app.'
        //             },
        //             {
        //                 property: 'og:description',
        //                 content: 'The home page of our example app.'
        //             }
        //         ],
        //         heroTitle: "All website development and programming services",
        //         heroSubtitle: "Idea, Structure and Design"
        //     }
        // }
    ]
});
