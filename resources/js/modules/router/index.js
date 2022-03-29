import Vue from "vue";
import VueRouter from "vue-router";
import Main from "../../views/Main";

const routes = [
    {
        path: '/',
        component: Main,
        name: 'index',
        meta: {
            title: 'Ban-DERA'
        }
    }
]

const originalPush = VueRouter.prototype.push;
VueRouter.prototype.push = function push(location) {
    return originalPush.call(this, location).catch(err => err)
};

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes,
    linkActiveClass: 'active-route',
    linkExactActiveClass: 'exact-active-route',
    scrollBehavior: () => ({ y: 0 })
});

export default router;
