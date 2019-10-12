<template>
    <div>
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
                                <inertia-link class="navbar-item" :class="{'is-active': isUrl('about')}" href="/about"
                                              @click.native="navBurger = false">
                                    About
                                </inertia-link>
<!--                                <inertia-link class="navbar-item" :class="{'is-active': isUrl('experience')}"-->
<!--                                              href="/experience" @click.native="navBurger = false">-->
<!--                                    Experience-->
<!--                                </inertia-link>-->
                                <inertia-link class="navbar-item" :class="{'is-active': isUrl('skills')}" href="/skills"
                                              @click.native="navBurger = false">
                                    Skills
                                </inertia-link>
                                <inertia-link class="navbar-item" :class="{'is-active': isUrl('portfolio')}"
                                              href="/portfolio" @click.native="navBurger = false">
                                    Portfolio
                                </inertia-link>
                                <inertia-link class="navbar-item" :class="{'is-active': isUrl('contact')}"
                                              href="/contact" @click.native="navBurger = false">
                                    Contact
                                </inertia-link>
                            </div>
                            <div class="navbar-end">
                                <div class="navbar-item">
                                    <a href="./storage/CV.pdf" target="_blank" class="button is-primary is-inverted">
                                        <span class="icon">
                                            <font-awesome-icon icon="file-pdf"/>
                                        </span>
                                        <span>CV</span>
                                    </a>
                                </div>
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

        <v-flash-messages></v-flash-messages>

        <transition name="fade-down" mode="out-in" appear>
            <slot/>
        </transition>
    </div>

</template>

<script>
    import vWave from '../components/Wave';
    import vPiggie from '../components/Piggie';
    import vFlashMessages from './FlashMessages';

    export default {
        data() {
            return {
                navBurger: false
            }
        },
        components: {
            vWave,
            vPiggie,
            vFlashMessages
        },
        methods: {
            isUrl(...urls) {
                let currentUrl = location.pathname.substr(1);

                if (urls[0] === '') {
                    return currentUrl === ''
                }
                return urls.filter(url => currentUrl.startsWith(url)).length
            },
            logout() {
                console.log('tirger');
                this.navBurger = false;
                this.$inertia.post('/logout');
            }
        },
        computed: {
            isLoggedIn() {
                return Boolean(this.$page.auth.user);
            }
        }
    }
</script>
