import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

/** Magic here */
const modulesFiles = require.context('./modules', false, /\.js$/);

const modules = modulesFiles.keys().reduce((modules, modulePath) => {
    const moduleName = (modulePath.replace(/^\.\/(.*)\.\w+$/, '$1')).replace(/-([a-z])/g, g => g[1].toUpperCase());
    const value = modulesFiles(modulePath);
    modules[moduleName] = value.default;
    return modules;
}, {});

export default new Vuex.Store({
    plugins:[
        createPersistedState()
    ],
    modules
});
