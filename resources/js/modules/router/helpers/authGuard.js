import store from "../../store";

export const AUTH = {
    GUEST: (to, from, next) => {
        if (store.getters['user/isAuthenticated']) {
            next({ name: 'dashboard'});
        } else {
            next();
        }
    },
    USER: (to, from, next) => {
        if (store.getters['user/isAuthenticated']) {
            next();
        } else {
            next({ name: 'login' });
        }
    }
}
