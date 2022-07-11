<template>
    <a
        href="javascript:void(0);"
        class="sounds-toggle"
        v-tooltip:bottom="(sounds ? 'Disable' : 'Enable') + ' sounds'"
        :key="sounds"
        @click.prevent="sounds = !sounds">
        <i class="bi" :class="sounds ? 'bi-volume-up-fill' : 'bi-volume-mute-fill'"></i>
    </a>
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
