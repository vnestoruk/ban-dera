import AuthenticationResource from "../../ajax/api/AuthenticationResource";

const state = {
    user: null,
    channels: {
        app: null
    }
}

const actions = {
    authenticate: (context, user) => {
        context.commit('SET_USER', user);
        context.dispatch('startListening');
    },
    logout: (context) => {
        context.commit('SET_USER', null);
        context.dispatch('stopListening');
    },
    startListening: (context) => {
        Echo.join('app')
            .here((users) => {
                context.commit('app/SET_ACTIVE_USERS', users, { root: true });
            })
            .joining((user) => {
                context.commit('app/ADD_ACTIVE_USER', user, { root: true });
            })
            .leaving((user) => {
                context.commit('app/REMOVE_ACTIVE_USER', user, { root: true });
            })
            .listen('SignUpEvent', (e) => {
                console.log('sign-up-event fired')
            });
    },
    stopListening: (context) => {
        Echo.leave('app');
    }
}

const mutations = {
    SET_USER: (state, user) => {
        state.user = user;
    },
    SET_CHANNELS: (state, channels) => {
        state.channels = channels;
    }
}

const getters = {
    user: (state) => state.user,
    isAuthenticated: (state) => state.user != null,
    channels: (state) => state.channels
}

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
}
