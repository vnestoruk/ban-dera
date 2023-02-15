import Vue from "vue";
import VueRouter from "vue-router";

import { AUTH } from "./helpers/authGuard";
import NProgress from "nprogress";

const routes = [
    {
        path: '/',
        component: () => import(/* webpackChunkName: "home" */'../../views/pages/Home'),
        name: 'index',
    },
    {
        path: '/targets',
        component: () => import(/* webpackChunkName: "targets" */'../../views/pages/TargetList'),
        name: 'targets'
    },
    {
        path: '/target/:id',
        component: () => import(/* webpackChunkName: "target" */'../../views/pages/Target'),
        name: 'target',
        props: true
    },
    {
        path: '/bunker',
        component: {
            template: '<router-view></router-view>'
        },
        redirect: { name: 'dashboard' },
        name: 'bunker',
        children: [
            {
                path: 'dashboard',
                component: () => import(/* webpackChunkName: "bunker" */'../../views/pages/bunker/Bunker'),
                beforeEnter: AUTH.USER,
                name: 'dashboard',
                meta: {
                    title: 'Криївка'
                },
            },
            {
                path: 'auth',
                component: () => import(/* webpackChunkName: "auth" */'../../views/pages/Authentication'),
                redirect: { name: 'login' },
                name: 'auth',
                children: [
                    {
                        path: 'login',
                        beforeEnter: AUTH.GUEST,
                        component: () => import(/* webpackChunkName: "login" */'../../views/components/Login'),
                        name: 'login'
                    },
                    {
                        path: 'signup',
                        beforeEnter: AUTH.GUEST,
                        component: () => import(/* webpackChunkName: "signup" */'../../views/components/SignUp'),
                        name: 'signup'
                    }
                ]
            },
        ]
    },
    {
        path: '/guide',
        component: () => import(/* webpackChunkName: "guide" */'../../views/pages/Guide'),
        name: 'guide',
        meta: {
            title: 'Guide'
        },
    },
    {
        path: '/about',
        component: () => import(/* webpackChunkName: "about" */'../../views/pages/About'),
        name: 'about',
        meta: {
            title: 'About'
        },

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

router.beforeEach((to, from, next) => {
    NProgress.start();
    next();
});

router.afterEach((to, from) => {
    NProgress.done();
    document.title = to.meta.title ? (to.meta.title + ' | Ban-DERA') : 'Ban-DERA';
});

export default router;
