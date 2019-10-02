<template>
    <article class="media portfolio">
        <figure class="media-left">
            <div class="image">
                <img alt="Currency exchange today" src="/images/espazon.png">
            </div>
        </figure>
        <div class="media-content">
            <div class="content">
                <h3>Espazon</h3>

                <h4>Description</h4>
                <p>
                    Website built at 2013 using amazon api / affiliate for spanish speaking people, functioning as a proxy.
                    It was #1 in google rankings for a while, untill amazon decide to shut it down with copyright claim.
                </p>

                <h4>How it works</h4>
                <ol>
                    <li>Client would search for items.</li>
                    <li>We would relate the search to amazon.</li>
                    <li>Transate results with api.</li>
                    <li>Display to user.</li>
                </ol>
            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    <a href="https://web.archive.org/web/20130225050216/http://www.espazon.com/" target="_blank" class="level-item">
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
