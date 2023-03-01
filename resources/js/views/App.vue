<template>
    <div class="main">
        <Header/>
        <transition name="fade" mode="out-in" :duration="{ enter: 1500, leave: 1500 }">
            <router-view></router-view>
        </transition>
        <Footer class="d-none d-md-flex"/>
        <notifications position="bottom right" class="m-3"/>
        <ControlPanel />
    </div>
</template>

<script>
import {mapActions} from "vuex";
import Bandera from "../modules/bandera";
import Header from "./components/Header";
import Footer from "./components/Footer";
import LocationResource from "../modules/ajax/api/LocationResource";
import ControlPanel from "./components/ControlPanel";
import AuthenticationResource from "../modules/ajax/api/AuthenticationResource";


export default {
    name: "App",
    components: {ControlPanel, Footer, Header},
    computed: {
        nightMode: {
            set(value) {
                this.$store.commit('app/SET_THEME', value);
            },
            get() {
                return this.$store.getters['app/nightMode'];
            },
        },
    },
    methods: {
        ...mapActions('user', ['authenticate', 'logout']),
        initTheme() {
            this.nightMode ??= window.matchMedia("(prefers-color-scheme: dark)").matches;
            document.body.setAttribute('data-theme', (this.nightMode) ? 'night' : 'light');
        },
        checkQuerySettings() {
            if (typeof this.$route.query.speed !== 'undefined' && Bandera._attackSpeed.includes(parseInt(this.$route.query.speed))) {
                this.$store.commit('app/SET_INTERVAL', (1000 / parseInt(this.$route.query.speed)))
            }

            if (typeof this.$route.query.max !== 'undefined' && Bandera._maxTargets.includes(parseInt(this.$route.query.max))) {
                this.$store.commit('app/SET_MAX_TARGETS', parseInt(this.$route.query.max))
            }

            if (typeof this.$route.query.autostart !== 'undefined') {
                this.$store.commit('app/SET_AUTOSTART', this.$route.query.autostart === 'true')
            }
        },
    },
    beforeMount() {
        this.initTheme();
    },
    async mounted() {
        this.checkQuerySettings();

        // Get info about current location by IP-address
        await new LocationResource().getLocation()
            .then(response => {
                this.$store.commit('app/SET_LOCATION', response);
            });
        // Authentication
        await new AuthenticationResource().signIn()
            .then((response) => {
                this.authenticate(response.data);
            })
            .catch((e) => {
                this.logout();
            });

        Echo.listen('default', 'NewUser', (e) => {
            this.$notify({
                title: this.$t('notification.title.newUser'),
                text: this.$t('notification.text.newUser', {
                    nickname: e.nickname,
                })
            })
        });

        Echo.listen('default', 'TargetAttackState', (e) => {
            console.log(e.target);
            e.target.under_attack
                ? this.$store.dispatch('app/addWorker', e.target)
                : this.$store.dispatch('app/removeWorker', e.target);
            this.$notify({
                title: this.$t('notification.title.targetAttackState'),
                text: this.$t('notification.text.targetAttackState.' + (e.target.under_attack ? 'start' : 'stop'), {
                    url: e.target.url,
                })
            });
        });

        document.getElementById('preloader').classList.remove('show');
    },
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition-duration: 0.8s;
    transition-property: opacity;
    transition-timing-function: ease-in-out;
}

.fade-enter,
.fade-leave-active {
    opacity: 0
}
</style>
