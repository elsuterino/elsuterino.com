<template>
    <article class="media portfolio">
        <figure class="media-left">
            <div class="image">
                <img alt="Currency exchange today" src="/images/dolardeverdad.png">
            </div>
        </figure>
        <div class="media-content">
            <div class="content">
                <h3>Dolar de verdad</h3>

                <h4>Description</h4>
                <p>A simple one page app on request of a friend.</p>

                <h4>Features</h4>
                <ul>
                    <li>Can see the Venezuelan currency rates against the dollar on localbitcoin exchanges.</li>
                </ul>

                <h4>How it works</h4>
                <ol>
                    <li>Takes data from exchange rates today database.</li>
                    <li>Calculates the value between venezuelan dollar and us dollar (localbitcoin to coinbase because there is no official rate for USD to VES).</li>
                    <li>Displaty current and historical data.</li>
                </ol>
            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    <a href="https://dolardeverdad.com" target="_blank" class="level-item">
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
