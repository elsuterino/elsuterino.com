<template>
    <section class="section">
        <div class="container">
            <h2 class="title is-2">Contact</h2>
            <div class="columns">
                <div class="column">
                    <div class="level is-size-4">
                        <div class="level-item contacts">
                            <a href="https://github.com/elsuterino" target="_blank" rel="noopener"
                               class="is-flex items-center">
                                    <span class="icon is-medium">
                                        <font-awesome-icon :icon="['fab', 'github']"/>
                                    </span>
                                <span>GitHub</span>
                            </a>
                        </div>
                        <div class="level-item contacts">
                            <a href="https://www.linkedin.com/in/vytautas-riauka" rel="noopener" target="_blank"
                               class="is-flex items-center">
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
                    <div v-if="!sent" class="box">
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label" for="name">Name</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control is-expanded">
                                        <input id="name"
                                               class="input"
                                               :class="{'is-danger': $page.errors.name}"
                                               type="text"
                                               placeholder="Name"
                                               v-model="form.name">
                                    </div>
                                    <div v-if="$page.errors.name" class="help is-danger">
                                        {{ $page.errors.name[0] }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label" for="email">Email</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input id="email"
                                               class="input"
                                               :class="{'is-danger': $page.errors.email}"
                                               type="email"
                                               placeholder="Email you wish to get replied to"
                                               v-model="form.email">
                                    </div>
                                    <div v-if="$page.errors.email" class="help is-danger">
                                        {{ $page.errors.email[0] }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label" for="message">Message</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea id="message"
                                                  class="textarea"
                                                  :class="{'is-danger': $page.errors.message}"
                                                  placeholder="Message"
                                                  v-model="form.message">
                                        </textarea>
                                    </div>
                                    <div v-if="$page.errors.message" class="help is-danger">
                                        {{ $page.errors.message[0] }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <!-- Left empty for spacing -->
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <button class="button is-primary" :class="{'is-loading': loading}"
                                                :disabled="loading"
                                                @click="sendMessage()">
                                            Send a message
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Layout from '../Shared/Layout';

    export default {
        metaInfo: {
            title: 'El Suterino',
            titleTemplate: '%s - Contact',
        },
        layout: (h, page) => h(Layout, [page]),
        data() {
            return {
                form: {
                    name: null,
                    message: null,
                    email: null
                },
                loading: false,
                sent: false
            }
        },
        methods: {
            sendMessage() {
                this.loading = true;

                this.$inertia.post('/contact', this.form)
                    .then(() => {
                        this.loading = false;
                        this.sent = true;
                    });
            }
        },
    }
</script>
