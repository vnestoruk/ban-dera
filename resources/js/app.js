require('./bootstrap');
// import wb from "./modules/pwa/registerServiceWorker";

import Vue from "vue";
import i18n from "./modules/i18n";
import store from "./modules/store";
import router from "./modules/router";
import VueNotification from "vue-notification";
import VueSocialSharing from "vue-social-sharing";
import * as bootstrap from "bootstrap";

import App from './views/App'

import filterDateTime from "./modules/filters/dateTime";
import filterDataUnits from "./modules/filters/dataUnits";
import filterNickname from "./modules/filters/nickname";
import filterPrice from "./modules/filters/price";
import filterTargetHealth from "./modules/filters/targetHealth";
import Tooltip from "./modules/directives/Tooltip";

window.bootstrap = bootstrap;

/**
 * Components
 */


/**
 * Directives
 */
Vue.directive('tooltip', Tooltip);

/**
 * Filters
 */
Vue.filter('filterDateTime', filterDateTime);
Vue.filter('filterDataUnits', filterDataUnits);
Vue.filter('filterNickname', filterNickname);
Vue.filter('filterPrice', filterPrice);
Vue.filter('filterTargetHealth', filterTargetHealth);

/**
 * Plugins
 */
Vue.use(VueNotification);
Vue.use(VueSocialSharing);


/**
 * Mixins
 */
// Vue.mixin(SoundsMixin);

new Vue({
    el: '#app',
    store,
    router,
    i18n,
    render: h => h(App)
})
