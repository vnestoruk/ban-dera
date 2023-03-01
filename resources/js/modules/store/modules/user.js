import AuthenticationResource from "../../ajax/api/AuthenticationResource";
import i18n from "../../i18n";

const state = {
    user: null
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
                this.$notify({
                    title: i18n.t('notification.title.newUser'),
                    text: i18n.t('notification.text.newUser', {
                        nickname: e.nickname,
                    })
                })
            });
    },
    stopListening: (context) => {
        Echo.leave('app');
    }
}

const mutations = {
    SET_USER: (state, user) => {
        state.user = user;
    }
}

const getters = {
    user: (state) => state.user,
    isAuthenticated: (state) => state.user != null,
    isAdmin: (state) => state.user && state.user.roles.includes('admin'),
    isModerator: (state) => state.user && state.user.roles.includes('moderator'),
    isMember: (state) => state.user && state.user.roles.includes('member')
}

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
}
