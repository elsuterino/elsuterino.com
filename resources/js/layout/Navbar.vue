<template>
    <section class="hero is-primary is-bold is-relative">
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
            <nav class="navbar is-transparent">
                <div class="container">
                    <div class="navbar-brand">
                        <span class="navbar-burger burger has-text-white" @click="navBurger = !navBurger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div class="navbar-menu" :class="{'is-active': navBurger}">
                        <div class="navbar-start">
                            <router-link class="navbar-item" :to="{name: 'about'}" @click.native="navBurger = false" exact>
                                About
                            </router-link>
                            <router-link class="navbar-item" :to="{name: 'experience'}" @click.native="navBurger = false">
                                Experience
                            </router-link>
                            <router-link class="navbar-item" :to="{name: 'skills'}" @click.native="navBurger = false">
                                Skills
                            </router-link>
                            <router-link class="navbar-item" :to="{name: 'portfolio'}" @click.native="navBurger = false">
                                Portfolio
                            </router-link>
                            <router-link class="navbar-item" :to="{name: 'contact'}" @click.native="navBurger = false">
                                Contact
                            </router-link>
                        </div>
                        <div class="navbar-end">
                            <span class="navbar-item">
                                <a href="./storage/CV.pdf" target="_blank" class="button is-primary is-inverted">
                                    <span class="icon">
                                        <font-awesome-icon icon="file-pdf"/>
                                    </span>
                                    <span>CV</span>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body" style="z-index:5">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <h1 class="title is-1">
                            Vytautas Riauka Portfolio
                        </h1>
                        <h2 class="subtitle">
                            Fullstack Web Developer
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <v-wave class="wave" style="z-index:20;"></v-wave>

        <v-piggie class="piggie"></v-piggie>
<!--        <img alt="piggie" class="piggie" src="/images/piggie.svg">-->

        <div class="hero-foot"></div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                navBurger: false
            }
        }
    }
</script>
