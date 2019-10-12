<template>
    <section class="section">
        <div class="container">
            <h2 class="title is-2">Portfolio</h2>

            <b-tabs v-model="activeTab">
                <b-tab-item v-for="project in projects" :label="project.title" :key="project.id">
                    <article class="media portfolio">
                        <figure class="media-left">
                            <div class="image">
                                <img :alt="project.title" :srcset="project.src_set">
                            </div>
                        </figure>
                        <div class="media-content">
                            <div class="content" v-html="render(project.body)"></div>
                            <nav class="level is-mobile">
                                <div class="level-left">
                                    <a v-if="project.github" :href="project.github" target="_blank" class="level-item">
                                        <span class="icon">
                                            <font-awesome-icon :icon="['fab', 'github']"></font-awesome-icon>
                                        </span>
                                        <span>GitHub</span>
                                    </a>
                                    <a v-if="project.website" :href="project.website" target="_blank" class="level-item">
                                        <span class="icon">
                                            <font-awesome-icon :icon="['fas', 'globe']"></font-awesome-icon>
                                        </span>
                                        <span>Website</span>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </article>
                </b-tab-item>
            </b-tabs>
        </div>
    </section>
</template>

<script>
    import Layout from '../Shared/Layout';

    const md = require('markdown-it')();

    export default {
        props:{
            projects: Array
        },
        metaInfo: {
            title: 'El Suterino',
            titleTemplate: '%s - Portfolio',
        },
        data(){
            return {
                activeTab: 0
            }
        },
        layout: (h, page) => h(Layout, [page]),
        methods:{
            render(markdown){
                return md.render(markdown);
            }
        }
    }
</script>
