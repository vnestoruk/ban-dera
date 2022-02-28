import Vue from "vue";
import Bandera from "./views/Bandera";

Vue.filter('rate', (value) => {
    return (!value) ? '0%' : value.toFixed(0).padStart(3, ' ') + '%';
})

new Vue({
    el: '#app',
    render: h => h(Bandera)
})
