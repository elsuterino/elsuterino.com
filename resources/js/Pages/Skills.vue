<template>
    <section class="section">
        <div class="container">
            <h2 class="title is-2">Skills</h2>
            <div class="columns">
                <div v-for="group in skills" class="column">
                    <h3 class="heading is-size-4">
                        {{ group.title }}
                    </h3>
                    <ul>
                        <li v-for="skill in group.skills" class="is-flex is-center">
                            <div class="level is-mobile" style="width:100%">
                                <div class="level-left">
                                    <div class="level-item">
                                        <span v-if="skill.icon && skill.icon instanceof Array" class="icon">
                                            <font-awesome-icon  :icon="skill.icon"></font-awesome-icon>
                                        </span>
                                        <span v-else-if="skill.icon" class="icon" v-html="skill.icon"></span>
                                        <span v-else class="icon"></span>
                                        {{ skill.title }}
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <span v-for="index in skill.stars" class="icon is-small has-text-warning" :key="index">
                                            <font-awesome-icon icon="star" size="xs"></font-awesome-icon>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Layout from '../Shared/Layout';

    export default {
        props: {
            skills: Array
        },
        metaInfo: {
            title: 'El Suterino',
            titleTemplate: '%s - Experience / Skills',
        },
        layout: (h, page) => h(Layout, [page])
    }
</script>
