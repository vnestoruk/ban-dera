<template>
    <div class="main">
        <Header/>
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
        <Footer/>
        <notifications position="bottom right" class="m-3"/>
    </div>
</template>

<script>
import {mapActions} from "vuex";
import Bandera from "../modules/bandera";
import Header from "./elements/Header";
import Footer from "./elements/Footer";

export default {
    name: "App",
    components: {Footer, Header},
    methods: {
        ...mapActions('app', ['initTheme'])
    },
    mounted() {
        this.initTheme();

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
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition-duration: 0.6s;
    transition-property: opacity;
    transition-timing-function: ease-in-out;
}

.fade-enter,
.fade-leave-active {
    opacity: 0
}
</style>
