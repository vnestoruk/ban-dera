export default {
    computed: {
        appVersion() {
            return process.env.MIX_APP_VERSION;
        },
        interval: {
            get() {
                return this.$store.getters['app/interval']
            },
            set(value) {
                this.$store.commit('app/SET_INTERVAL', value);
            }
        }
    }
}
