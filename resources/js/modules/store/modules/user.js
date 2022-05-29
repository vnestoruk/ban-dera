import AuthenticationResource from "../../ajax/api/AuthenticationResource";

const state = {
    user: null
}

const actions = {
    authenticate: (context) => {
        context.commit('SET_USER', null);
        new AuthenticationResource().signIn()
            .then((response) => {
                context.commit('SET_USER', response.data);
            });
    },
    logout: (context) => {
        new AuthenticationResource().logOut()
            .then((response) => {
                context.commit('SET_USER', null);
            });
    }
}

const mutations = {
    SET_USER: (state, user) => {
        state.user = user;
    }
}

const getters = {
    user: (state) => state.user,
    isAuthenticated: (state) => state.user != null
}

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
}
