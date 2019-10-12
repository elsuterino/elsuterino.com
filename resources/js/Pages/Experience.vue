<template>
    <section class="section">
        <div class="container">
            <h2 class="title is-2">Experience</h2>

            <b-steps v-model="activeStep" :animated="true">
                <b-step-item label="2008" :clickable="true">
                    <p class="heading">2008 - 2014</p>
                    <p class="is-size-4" style="margin-bottom:1.5rem;"><strong>Freelancing</strong> - working as a remote freelancer with clients from Venezuela and USA</p>
                </b-step-item>
                <b-step-item label="2010" :clickable="true">
                    <p class="heading">2008 - 2014</p>
                    <p class="is-size-4" style="margin-bottom:1.5rem;"><strong>Freelancing</strong> - working as a remote freelancer with clients from Venezuela and USA</p>
                </b-step-item>
                <b-step-item label="2012" :clickable="true">
                    <p class="heading">2008 - 2014</p>
                    <p class="is-size-4" style="margin-bottom:1.5rem;"><strong>Freelancing</strong> - working as a remote freelancer with clients from Venezuela and USA</p>
                </b-step-item>
                <b-step-item label="2014" :clickable="true">
                    <p class="heading">2008 - 2014</p>
                    <p class="is-size-4" style="margin-bottom:1.5rem;"><strong>Freelancing</strong> - working as a remote freelancer with clients from Venezuela and USA</p>
                </b-step-item>
                <b-step-item label="2016" :clickable="true">
                    <p class="heading">2008 - 2014</p>
                    <p class="is-size-4" style="margin-bottom:1.5rem;"><strong>Freelancing</strong> - working as a remote freelancer with clients from Venezuela and USA</p>
                </b-step-item>
                <b-step-item label="2018" :clickable="true">
                    <p class="heading">2008 - 2014</p>
                    <p class="is-size-4" style="margin-bottom:1.5rem;"><strong>Freelancing</strong> - working as a remote freelancer with clients from Venezuela and USA</p>
                </b-step-item>
                <b-step-item label="2019" :clickable="true">
                    <p class="heading">2014 - 2017</p>
                    <p class="is-size-4" style="margin-bottom:1.5rem;">
                        <strong>Inetvi</strong> - a small team in venezuela, continuing working with South and North american clients, providing business management systems.
                    </p>
                </b-step-item>
            </b-steps>
        </div>
    </section>
</template>

<script>
    import Layout from '../Shared/Layout';

    export default {
        metaInfo: {
            title: 'El Suterino',
            titleTemplate: '%s - Experience / Skills',
        },
        layout: (h, page) => h(Layout, [page]),
        data() {
            return {
                activeStep: 0,
            }
        }
    }
</script>
