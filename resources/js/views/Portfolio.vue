<template>
    <section class="section">
        <div class="container">
            <h1 class="title is-1">Portfolio</h1>

            <currency-exchange-today></currency-exchange-today>

            <hr>

            <dolardeverdad></dolardeverdad>

        </div>
    </section>
</template>

<script>
    import CurrencyExchangeToday from "./portfolio/CurrencyExchangeToday";
    import Dolardeverdad from "./portfolio/Dolardeverdad";

    export default {
        metaInfo: {
            title: 'El Suterino',
            titleTemplate: '%s - Portfolio',
        },
        components:{
            CurrencyExchangeToday,
            Dolardeverdad
        }
    }
</script>
