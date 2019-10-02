<template>
    <section class="section">
        <div class="container">
            <h2 class="title is-2">Experience / Skills</h2>
            <div class="columns">
                <div v-for="(items, name) in skills" class="column">
                    <h3 class="heading is-size-4">{{ name }}</h3>
                    <ul>
                        <li v-for="item in items" class="is-flex is-center">
                            <div class="level is-mobile" style="width:100%">
                                <div class="level-left">
                                    <div class="level-item">
                                        <span v-if="item.icon && item.icon instanceof Array" class="icon">
                                            <font-awesome-icon  :icon="item.icon"></font-awesome-icon>
                                        </span>
                                        <span v-else-if="item.icon" class="icon" v-html="item.icon"></span>
                                        <span v-else class="icon"></span>
                                        {{ item.name }}
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <span v-for="index in item.level" class="icon is-small has-text-warning">
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
    export default {
        metaInfo: {
            title: 'El Suterino',
            titleTemplate: '%s - Experience / Skills',
        },
        data() {
            return {
                skills: {
                    languages: [
                        {
                            name: 'PHP',
                            level: 5,
                            expertise: 10,
                            icon: ['fab', 'php']
                        },
                        {
                            name: 'JavaScript',
                            level: 5,
                            expertise: 8,
                            icon: ['fab', 'js']
                        },
                        {
                            name: 'HTML',
                            level: 5,
                            expertise: 10,
                            icon: ['fab', 'html5']
                        },
                        {
                            name: 'CSS',
                            level: 5,
                            expertise: 8,
                            icon: ['fab', 'css3-alt']
                        },
                        {
                            name: 'SQL',
                            level: 5,
                            expertise: 10,
                            icon: ['fas', 'database']
                        }
                    ],
                    frameworks: [
                        {
                            name: 'Laravel',
                            level: 5,
                            expertise: 5,
                            icon: ['fab', 'laravel']
                        },
                        {
                            name: 'VueJS',
                            level: 5,
                            expertise: 3,
                            icon: ['fab', 'vuejs']
                        },
                        {
                            name: 'Symfony',
                            level: 4,
                            expertise: 2,
                            icon: ['fab', 'symfony']
                        },
                        {
                            name: 'JQuery',
                            level: 3,
                            expertise: 3,
                            icon: ['fab', 'jquery']
                        },
                        {
                            name: 'Wordpress',
                            level: 2,
                            expertise: 1,
                            icon: ['fab', 'wordpress']
                        },
                    ],
                    databases: [
                        {
                            name: 'MySQL',
                            level: 5,
                            expertise: 10,
                            icon: ['fab', 'mysql']
                        },
                        {
                            name: 'InfluxDB',
                            level: 4,
                            expertise: 3,
                            icon: ['fab', 'influxdb']
                        },
                        {
                            name: 'ElasticSearch',
                            level: 3,
                            expertise: 2,
                            icon: ['fab', 'elasticsearch']
                        },
                        {
                            name: 'Redis',
                            level: 3,
                            expertise: 2,
                            icon: ['fab', 'redis']
                        },
                    ],
                    devOps: [
                        {
                            name: 'Ubuntu/Arch',
                            level: 4,
                            expertise: 4,
                            icon: ['fab', 'ubuntu']
                        },
                        {
                            name: 'Nginx',
                            level: 4,
                            expertise: 5,
                            icon: ['fab', 'redis']
                        },
                        {
                            name: 'Docker',
                            level: 3,
                            expertise: 2,
                            icon: ['fab', 'docker']
                        },
                    ]
                }

            }
        }
    }
</script>
