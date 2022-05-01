import store from "../../store";

export const AUTH = {
    GUEST: (to, from, next) => {
        if (store.getters['app/authenticated']) {
            next({ name: 'dashboard'});
        } else {
            next();
        }
    },
    USER: (to, from, next) => {
        if (store.getters['app/authenticated']) {
            next();
        } else {
            next({ name: 'login' });
        }
    }
}
