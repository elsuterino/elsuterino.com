<template>
    <article class="media portfolio">
        <figure class="media-left">
            <div class="image">
                <img alt="Currency exchange today" src="/images/currency_exchanges.png">
            </div>
        </figure>
        <div class="media-content">
            <div class="content">
                <h3>Currency Exchange App</h3>

                <h4>Features</h4>
                <ul>
                    <li>Can view currency exchange rates on various diferent platforms.</li>
                    <li>Can view currency rate historical data.</li>
                    <li>Can edit your prefered currency combinations to be shown on home view.</li>
                </ul>

                <h4>How it works</h4>
                <ol>
                    <li>This website uses various api for collecting data like transferwise, localbitcoin, coinbase.</li>
                    <li>It is then collected, calculated and stored in InfluxDB every hour, thats roughly 150x150x3 = 67,500 rows.</li>
                    <li>Served latest and historical data to users through my API</li>
                </ol>

                <h4>Technologies used</h4>
                <ul>
                    <li><b>Laravel</b> - Best framework to bootstrap it all.</li>
                    <li><b>InfluxDB</b> - Simply amazing at storing and serving huge amounts of simple data.</li>
                    <li><b>VueJS</b> - To have SPA with reactive functionality.</li>
                    <li><b>Progressive Web App (PWA)</b> - Wanted to learn.</li>
                    <li><b>TailwindCSS</b> - Because of the freedom it gives right out of the box.</li>
                </ul>

                <h4>What i learned</h4>
                <p>
                    InfluxDB is simply amazing to work with historical data, its fast and reliable.
                </p>
                <p>
                    Focusing on PWA doesnt seem to be all that great since the technology isnt fully developed yet and
                    some companies/browsers like apple doesnt support it at all.
                </p>
            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    <a href="https://github.com/elsuterino/exchangerates" target="_blank" class="level-item">
                        <span class="icon">
                            <font-awesome-icon :icon="['fab', 'github']"></font-awesome-icon>
                        </span>
                        <span>GitHub</span>
                    </a>
                    <a href="https://currencyexchangetoday.com" target="_blank" class="level-item">
                        <span class="icon">
                            <font-awesome-icon :icon="['fas', 'globe']"></font-awesome-icon>
                        </span>
                        <span>Website</span>
                    </a>
                </div>
            </nav>
        </div>
    </article>
</template>

<script>
    export default {}
</script>
