import Vue from "vue";
import VueRouter from "vue-router";

import { AUTH } from "./helpers/authGuard";
import NProgress from "nprogress";

const routes = [
    {
        path: '/',
        component: () => import('../../views/pages/Main'),
        name: 'index',
    },
    {
        path: '/targets',
        component: () => import('../../views/pages/TargetList'),
        name: 'targets'
    },
    {
        path: '/target/:id',
        component: () => import('../../views/pages/Target'),
        name: 'target',
        props: true
    },
    {
        path: '/bunker',
        component: {
            template: '<router-view></router-view>'
        },
        children: [
            {
                path: 'dashboard',
                component: () => import('../../views/pages/bunker/Bunker'),
                beforeEnter: AUTH.USER,
                name: 'bunker',
                meta: {
                    title: 'Криївка'
                },
            },
            {
                path: 'auth',
                component: () => import('../../views/pages/Authentication'),
                redirect: '/auth/login',
                children: [
                    {
                        path: 'login',
                        beforeEnter: AUTH.GUEST,
                        component: () => import('../../views/components/Login'),
                        name: 'login'
                    },
                    {
                        path: 'signup',
                        beforeEnter: AUTH.GUEST,
                        component: () => import('../../views/components/SignUp'),
                        name: 'signup'
                    }
                ]
            },
        ]
    },
    {
        path: '/guide',
        component: () => import('../../views/pages/Guide'),
        name: 'guide',
        meta: {
            title: 'Guide'
        },
    },
    {
        path: '/about',
        component: () => import('../../views/pages/About'),
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
