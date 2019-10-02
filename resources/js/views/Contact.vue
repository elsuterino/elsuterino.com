<template>
    <div>
        <section class="section">
            <div class="container">
                <h2 class="title is-2">Contact</h2>
                <div class="columns">
                    <div class="column">
                        <div class="level is-size-4">
                            <div class="level-item contacts">
                                <a href="https://github.com/elsuterino" target="_blank" rel="noopener" class="is-flex items-center">
                                    <span class="icon is-medium">
                                        <font-awesome-icon :icon="['fab', 'github']"/>
                                    </span>
                                    <span>GitHub</span>
                                </a>
                            </div>
                            <div class="level-item contacts">
                                <a href="https://www.linkedin.com/in/vytautas-riauka" rel="noopener" target="_blank" class="is-flex items-center">
                                    <span class="icon is-medium">
                                        <font-awesome-icon :icon="['fab', 'linkedin']"/>
                                    </span>
                                    <span>LinkedIn</span>
                                </a>
                            </div>
                            <div class="level-item contacts">
                                <a href="skype:sutrius11" rel="noopener" class="is-flex items-center">
                                    <span class="icon is-medium">
                                        <font-awesome-icon :icon="['fab', 'skype']"/>
                                    </span>
                                    <span>Skype</span>
                                </a>
                            </div>
                            <div class="level-item contacts">
                                <a href="mailto:elsuterino@gmail.com" class="is-flex items-center">
                                    <span class="icon is-medium">
                                        <font-awesome-icon :icon="['fas', 'envelope']"/>
                                    </span>
                                    <span>elsuterino@gmail.com</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns is-centered">
                    <div class="column is-half">
                        <v-contact-form></v-contact-form>
                    </div>
                </div>
            </div>
        </section>
    </div>

</template>

<script>
    export default {
        metaInfo: {
            title: 'El Suterino',
            titleTemplate: '%s - Contact',
        },
    }
</script>
