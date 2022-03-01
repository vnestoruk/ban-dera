import Vue from "vue";
import i18n from "./modules/i18n";
import Bandera from "./views/Bandera";

Vue.filter('rate', (value) => {
    return (!value) ? '0%' : value.toFixed(0).padStart(3, ' ') + '%';
})

new Vue({
    el: '#app',
    i18n,
    render: h => h(Bandera)
})
