import Vue from "vue";
import i18n from "./modules/i18n";
import store from "./modules/store";
import router from "./modules/router";
import VueNotification from "vue-notification";
import VueSocialSharing from "vue-social-sharing";
import * as bootstrap from "bootstrap"

import App from './views/App'

window.bootstrap = bootstrap;

Vue.directive('tooltip', function(el, binding) {
    let tooltip = new bootstrap.Tooltip(el, {
        title: binding.value,
        placement: binding.arg,
        container: 'body',
        trigger: 'hover'
    });
    el.addEventListener('mouseleave', function() {
        tooltip.hide();
    })
});

Vue.use(VueNotification);
Vue.use(VueSocialSharing);

new Vue({
    el: '#app',
    store,
    router,
    i18n,
    render: h => h(App)
})
