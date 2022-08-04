<template>
    <button
        class="theme-toggle"
        v-tooltip:bottom="'Switch to ' + (nightMode ? 'light' : 'dark') + ' theme'"
        :key="nightMode"
        @click.prevent="nightMode = !nightMode"
        aria-label="Change theme">
        <i class="bi" :class="nightMode ? 'bi-moon-fill' : 'bi-sun'"></i>
    </button>
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
