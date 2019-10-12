<template>

</template>
<script>
    export default {
        watch: {
            '$page.flash': {
                handler() {
                    if(this.$page.flash.success){
                        this.$buefy.snackbar.open({
                            duration: 5000,
                            message: this.$page.flash.success
                        })
                    }
                    if(Object.keys(this.$page.errors).length > 0){
                        this.$buefy.snackbar.open({
                            duration: 5000,
                            message: Object.keys(this.$page.errors).length === 1 ? 'There is one form error.' : `There are ${Object.keys(this.$page.errors).length } form errors.`,
                            type: 'is-danger',
                            position: 'is-bottom-left',
                            queue: false
                        })
                    }
                },
                deep: true,
            },
        },
    }
</script>
