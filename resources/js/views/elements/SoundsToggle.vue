<template>
    <button
        class="sounds-toggle"
        v-tooltip:bottom="(sounds ? 'Disable' : 'Enable') + ' sounds'"
        :key="sounds"
        @click.prevent="sounds = !sounds"
        aria-label="Sounds toggle">
        <i class="bi" :class="sounds ? 'bi-volume-up-fill' : 'bi-volume-mute-fill'"></i>
    </button>
</template>

<script>
export default {
    name: "SoundsToggle",
    computed: {
        sounds: {
            set(value) {
                this.$store.commit('app/SET_SOUNDS', value);
            },
            get() {
                return this.$store.getters['app/sounds'];
            }
        }
    }
}
</script>

<style scoped>

</style>
