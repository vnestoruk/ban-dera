import TargetResource from "../../ajax/api/TargetResource";
import WorkerWrapper from "../../models/WorkerWrapper";

const state = {
    settings: {
        locale: null,
        nightMode: null,
        sounds: true,
        autostart: false,
        interval: 100,
        maxTargets: 10,
    },
    activeUsers: [],
    workers: [],
    location: {},
    isRunning: false
}

const actions = {
    getAttack: (context) => {
        context.commit('SET_WORKERS', []);
        new TargetResource().getAttackList().then(
            (response) => {
                response.data.forEach(target => {
                    context.commit('ADD_WORKER', new WorkerWrapper(target, context.getters['interval']));
                });
            }
        )
    },
    start: (context) => {
        context.getters['workers'].forEach(worker => {
            worker.start();
        });
        context.commit('SET_RUNNING', true);
    },
    stop: (context) => {
        context.getters['workers'].forEach(worker => {
            worker.stop();
        });
        context.commit('SET_RUNNING', false);
    },
}

const mutations = {
    SET_LOCALE: (state, locale) => {
        state.settings.locale = locale;
    },
    SET_THEME: (state, nightMode) => {
        state.settings.nightMode = nightMode;
    },
    SET_SOUNDS: (state, sounds) => {
        state.settings.sounds = sounds;
    },
    SET_AUTOSTART: (state, autostart) => {
        state.settings.autostart = autostart;
    },
    SET_INTERVAL: (state, interval) => {
        state.settings.interval = interval;
    },
    SET_MAX_TARGETS: (state, maxTargets) => {
        state.settings.maxTargets = maxTargets;
    },
    SET_WORKERS: (state, value) => {
        state.workers = value;
    },
    ADD_WORKER: (state, wrapper) => {
        // let workerObj = {
        //     id: target.id,
        //     worker: new Worker("/js/workers/bandera.js")
        // };
        //
        // workerObj.worker.onmessage = function(e) {
        //     console.log('Target URL: ' + target.url + '; ' + e.data.total);
        // }
        //
        // workerObj.worker.postMessage({
        //     target,
        //     interval: state.settings.interval
        // });

        state.workers.push(wrapper);
    },
    SET_LOCATION: (state, location) => {
        state.location = location;
    },
    SET_RUNNING: (state, isRunning) => {
        state.isRunning = isRunning;
    },
    SET_ACTIVE_USERS: (state, value) => {
        state.activeUsers = value;
    },
    ADD_ACTIVE_USER: (state, user) => {
        state.activeUsers.unshift(user);
    },
    REMOVE_ACTIVE_USER: (state, user) => {
        state.activeUsers = state.activeUsers.filter(u => u.id !== user.id);
    }
}

const getters = {
    locale: (state) => state.settings.locale,
    nightMode: (state) => state.settings.nightMode,
    sounds: (state) => state.settings.sounds,
    autostart: (state) => state.settings.autostart,
    interval: (state) => state.settings.interval,
    maxTargets: (state) => state.settings.maxTargets,
    workers: (state) => state.workers,
    worker: (state) => (id) => state.workers.find(worker => worker.id === id),
    location: (state) => state.location,
    isRunning: (state) => state.isRunning,
    activeUsers: (state) => state.activeUsers,
}

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
}
