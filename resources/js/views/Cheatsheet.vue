<template>
    <section class="section">
        <div class="container">
            <div class="field">
                <label class="label">Search</label>
                <div class="control">
                    <input class="input" v-model="search" type="text" placeholder="Search">
                </div>
            </div>
            <div v-for="entry in searchedCheatsheet" class="card">
                <div class="card-content">
                    <h5 class="title is-5">{{ entry.title }}</h5>
                    <div class="content" v-html="markdownit(entry.body)"></div>
                    <div>
                        <div class="level">
                            <div class="level-left">

                            </div>
                            <div class="level-right">
                                <div class="level-item" v-for="tag in entry.tags">{{ tag }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    // import Something from './cheatsheet/Laravel/*';
    const md = require('markdown-it')();

    export default {
        metaInfo: {
            title: 'El Suterino',
            titleTemplate: '%s - Cheatsheet',
        },
        data() {
            return {
                cheatsheet: window.cheatsheet,
                search: ''
            }
        },
        mounted() {
            // console.log(Something);
        },
        computed: {
            searchedCheatsheet() {
                return this.sortSearch(this.search, this.cheatsheet);
            }
        },
        methods: {
            markdownit(value) {
                return md.render(value);
            },
            sortSearch(search, original) {
                let words = search.split(" ");

                let filtered = _.filter(original, item => {
                    return this.rankItem(words, item) !== 0;
                });

                return _.sortBy(filtered, item => {
                    return this.rankItem(words, item);
                });
            },
            rankItem(words, item) {
                let score = 0;

                for (let i = 0; i < words.length; i++) {
                    let word = words[i].toLowerCase();
                    if(item.title.toLowerCase().includes(word.toLowerCase())){
                        score -= 5;
                    }

                    if(item.description && item.description.toLowerCase().includes(word.toLowerCase())){
                        score -= 2;
                    }

                    for(let z = 0; z < item.tags.length; z++){
                        let tag = item.tags[z];

                        if(tag.includes(word.toLowerCase())){
                            score -= 5;
                        }
                    }
                }

                return score;
            }
        }
    }
</script>
