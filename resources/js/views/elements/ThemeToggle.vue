<template>
    <div class="d-flex form-check form-switch justify-content-center">
        <label class="form-check-label">
            <input class="form-check-input me-2" type="checkbox" v-model="nightMode">
            {{ $t('night') }}
        </label>
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
