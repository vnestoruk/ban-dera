import TargetResource from "../../ajax/api/TargetResource";
import WorkerWrapper from "../../models/WorkerWrapper";

const state = {
    settings: {
        locale: null,
        nightMode: null,
        sounds: true,
        autostart: false,
        interval: 200,
        maxTargets: 10,
    },
    activeUsers: [],
    workers: [],
    location: {},
    isRunning: false
}

const actions = {
    getAttack: async (context) => {
        context.commit('SET_WORKERS', []);
        await new TargetResource().getAttackList().then(
            (response) => {
                response.data.forEach(target => {
                    // console.log(target);
                    context.dispatch('addWorker', target);
                    // context.commit('ADD_WORKER', new WorkerWrapper(target));
                });
            }
        )
    },
    start: async (context) => {
        if (context.getters['isRunning']) return;

        // if it is our first start - retrieving attack list from server
        if (!context.getters['workers'].length) {
            await context.dispatch('getAttack');
        }

        context.getters['workers'].forEach(worker => {
            worker.start();
        });

        context.commit('SET_RUNNING', true);
    },
    stop: (context) => {
        if (!context.getters['isRunning']) return;

        context.getters['workers'].forEach(worker => {
            worker.stop();
        });
        context.commit('SET_RUNNING', false);
    },
    addWorker(context, target) {
        const wrapper = new WorkerWrapper(target);
        context.commit('ADD_WORKER', wrapper);
        if (context.getters['isRunning']) {
            context.getters['workers'].at(-1).start();
        }
    },
    removeWorker(context, target) {
        const index = context.getters['workers'].map(w => w.target.id).indexOf(target.id);
        if (context.getters['isRunning']) {
            context.getters['workers'][index].stop();
        }

        context.commit('REMOVE_WORKER', index);
    }
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
        state.workers.push(wrapper);
    },
    REMOVE_WORKER: (state, index) => {
        state.workers.splice(index, 1);
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
    speed: (state) => state.isRunning ? state.workers.length * 5 : 0,
    rate: (state) => Math.floor(state.workers.reduce((acc, w) => acc + w.analytics?.rate, 0) / state.workers.length) || 0,
    traffic: (state) => state.workers.reduce((acc, w) => acc + w.analytics?.traffic, 0) || 0
}

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
}
