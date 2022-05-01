<template>
    <div class="theme-toggle">
        <i class="bi" :class="nightMode ? 'bi-moon-fill' : 'bi-sun'" @click.prevent="nightMode = !nightMode"></i>
    </div>
</template>

<script>
export default {
    name: "ThemeToggle",
    computed: {
        nightMode: {
            set(value) {
                this.$store.commit('app/SET_THEME', value);
            },
            get() {
                return this.$store.getters['app/nightMode'];
            }
        }
    },
    watch: {
        nightMode: {
            handler: (newVal) => {
                document.body.setAttribute('data-theme', (newVal) ? 'night' : 'light');
            },
            immediate: true
        },
    },
}
</script>

<style scoped>

</style>
