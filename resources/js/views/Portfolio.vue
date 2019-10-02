<template>
    <section class="section">
        <div class="container">
            <h2 class="title is-2">Portfolio</h2>

            <currency-exchange-today></currency-exchange-today>

            <hr>

            <dolardeverdad></dolardeverdad>

            <hr>

            <espazon></espazon>
        </div>
    </section>
</template>

<script>
    import CurrencyExchangeToday from "./portfolio/CurrencyExchangeToday";
    import Dolardeverdad from "./portfolio/Dolardeverdad";
    import Espazon from "./portfolio/Espazon";

    export default {
        metaInfo: {
            title: 'El Suterino',
            titleTemplate: '%s - Portfolio',
        },
        components:{
            CurrencyExchangeToday,
            Dolardeverdad,
            Espazon
        }
    }
</script>
