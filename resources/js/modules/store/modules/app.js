import TargetResource from "../../ajax/api/TargetResource";

const state = {
    nightMode: null,
    sounds: true,
    autostart: false,
    interval: 100,
    maxTargets: 10,
    targets: [],
    blackList: [],
    location: {}
}

const actions = {
    getTargets: (context) => {
        new TargetResource().getTargets().then(
            (response) => {
                // TODO check data
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
    SET_SOUNDS: (state, sounds) => {
        state.sounds = sounds;
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
    SET_LOCATION: (state, location) => {
        state.location = location;
    }
}

const getters = {
    nightMode: (state) => state.nightMode,
    sounds: (state) => state.sounds,
    autostart: (state) => state.autostart,
    interval: (state) => state.interval,
    maxTargets: (state) => state.maxTargets,
    targets: (state) => state.targets,
    blackList: (state) => state.blackList,
    location: (state) => state.location
}

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
}
