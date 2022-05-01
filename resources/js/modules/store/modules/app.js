import request from "../../request";

const state = {
    locale: null,
    nightMode: null,
    autostart: false,
    interval: 100,
    maxTargets: 10,
    targets: [],
    blackList: [],
    location: {},
    status: {},
    authenticated: null
}

const actions = {
    getTargets: (context) => {
        return request({
            method: 'GET',
            url: '/api/targets'
        }).then(
            (response) => {
                // TODO check data
                context.commit('SET_LOCATION', response.location)
                context.commit('SET_STATUS', response.status)
                context.commit('SET_TARGETS', response.data)
            }
        );
    },
    initTheme: (context) => {
        if (context.state.nightMode === null) context.commit('SET_THEME', window.matchMedia("(prefers-color-scheme: dark)").matches);
    }
}

const mutations = {
    SET_LOCALE: (state, locale) => {
        state.locale = locale;
    },
    SET_THEME: (state, nightMode) => {
        state.nightMode = nightMode;
    },
    SET_AUTOSTART: (state, autostart) => {
        state.autostart = autostart;
    },
    SET_INTERVAL: (state, interval) => {
        state.interval = interval;
    },
    SET_MAX_TARGETS: (state, maxTargets) => {
        state.maxTargets = maxTargets;
    },
    SET_TARGETS: (state, targets) => {
        state.targets = targets;
    },
    SET_STATUS: (state, status) => {
        state.status = status;
    },
    SET_LOCATION: (state, location) => {
        state.location = location;
    }
}

const getters = {
    locale: (state) => state.locale,
    nightMode: (state) => state.nightMode,
    autostart: (state) => state.autostart,
    interval: (state) => state.interval,
    maxTargets: (state) => state.maxTargets,
    targets: (state) => state.targets,
    blackList: (state) => state.blackList,
    location: (state) => state.location,
    status: (state) => state.status,
    authenticated: (state) => state.authenticated
}

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
}
