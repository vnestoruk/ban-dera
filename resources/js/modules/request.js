import Vue from "vue";
import i18n from "./i18n";
import NProgress from 'nprogress';
window._ = require('lodash');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Accept'] = 'application/json';
window.axios.defaults.withCredentials = false;

// Create axios instance
const instance = window.axios.create({
    timeout: 10000,
});

// Request interceptor
instance.interceptors.request.use(
    config => {
        NProgress.start();
        return config;
    },
    error => {
        NProgress.done();
        return Promise.reject(error);
    }
);

// response pre-processing
instance.interceptors.response.use(
    response => {
        NProgress.done();
        return response.data;
    },
    error => {
        NProgress.done();
        switch(error.response.status) {
            case 429:
                Vue.notify({
                    title: i18n.t('notification.title.error'),
                    text: i18n.t('notification.text.error.429')
                });
                break;
            case 500:
                Vue.notify({
                    title: i18n.t('notification.title.error'),
                    text: i18n.t('notification.text.error.500')
                });
                break;
            default:
                Vue.notify({
                    title: i18n.t('notification.title.error'),
                    text: i18n.t('notification.text.error.unknown')
                });
        }

        return Promise.reject(error);
    }
);

export default instance;
