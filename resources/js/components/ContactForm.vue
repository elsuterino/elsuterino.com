<template>
    <div class="box is-relative">
        <transition name="fade" mode="out-in">
        <div v-if="messageSent" class="has-background-primary has-text-white is-size-4 items-center is-flex justify-center pin is-absolute z-20" style="position:absolute;top:0;bottom:0;left:0;right:0;z-index:20;display:flex;justify-content:center;">
            <div>
                <p>Your Message has Been sent !</p>
                <p>Will get back to you soon.</p>
            </div>
        </div>
        </transition>

        <div class="field is-horizontal" v-for="(error, field) in errors" v-if="!['name', 'email', 'message'].includes(field)">
            <div class="field-label is-normal">
                <label class="label"></label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="help is-danger">{{ error[0] }}</p>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label" for="name">Name</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded">
                        <input id="name"
                               class="input"
                               :class="{'is-danger': hasErrors('name')}"
                               type="text"
                               placeholder="Name"
                               v-model="form.name"
                               @keydown="clearErrors('name')"
                               @change="clearErrors('name')">
                    </div>
                    <p v-if="hasErrors('name')" class="help is-danger">{{ errors.name[0] }}</p>
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
                               :class="{'is-danger': hasErrors('email')}"
                               type="email"
                               placeholder="Email you wish to get replied to"
                               v-model="form.email"
                               @keydown="clearErrors('email')"
                               @change="clearErrors('email')">
                    </div>
                    <p v-if="hasErrors('email')" class="help is-danger">{{ errors.email[0] }}</p>
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
                                  :class="{'is-danger': hasErrors('message')}"
                                  placeholder="Message"
                                  v-model="form.message"
                                  @keydown="clearErrors('message')"
                                  @change="clearErrors('message')"
                        >
                        </textarea>
                    </div>
                    <p v-if="hasErrors('message')" class="help is-danger">{{ errors.message[0] }}</p>
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
                        <button class="button is-primary" :disabled="loading || messageSent" @click="onMessage">
                            Send a message
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                form: {
                    name: '',
                    message: '',
                    email: ''
                },
                errors: {},
                loading: false,
                messageSent: window.messageSent
            }
        },
        methods: {
            hasErrors(field){
                return Boolean(this.errors[field]);
            },
            clearErrors(field){
                delete this.errors[field];
            },
            onMessage() {
                this.loading = true;

                axios.post('/api/contact', this.form)
                    .then(response => {
                        this.form.name = '';
                        this.form.message = '';
                        this.form.email = '';

                        // some message
                        this.loading = false;
                        this.messageSent = true;
                        window.messageSent = true;
                    })
                    .catch(error => {
                        if(error.response.status === 422){
                            this.errors = error.response.data.errors;
                        }
                        if(error.response.status === 429){
                            this.errors = {throttle: [error.response.data.message]};
                        }
                        this.loading = false;
                    });
            }
        }
    }
</script>
