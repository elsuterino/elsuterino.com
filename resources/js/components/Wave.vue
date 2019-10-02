<template>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
         viewBox="0 0 100 7" width="100" height="7" preserveAspectRatio="none">
        <path v-if="main" d="M0 4Q23-2 50 4 77 10 100 4L100 8 0 8 0 4Z"
              :fill="mainColor"></path>
        <path v-if="secondary" d="M0 4Q23 10 50 4 77 -2 100 4L100 8 0 8 0 4Z"
              :fill="secondaryColor"></path>
    </svg>
</template>
<script>
    export default {
        props: {
            main:{
                type: Boolean,
                default: true
            },
            mainColor:{
                type: String,
                default: 'rgba(255,255,255, 1)'
            },
            secondary:{
                type: Boolean,
                default: true
            },
            secondaryColor:{
                type: String,
                default: 'rgba(255,255,255, 0.5)'
            },
        }
    }
</script>
