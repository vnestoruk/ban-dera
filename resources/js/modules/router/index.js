import Vue from "vue";
import VueRouter from "vue-router";

import { AUTH } from "./helpers/authGuard";

const routes = [
    {
        path: '/',
        component: () => import('../../views/pages/Main'),
        name: 'index',
        meta: {
            title: 'Ban-DERA'
        }
    },
    {
        path: '/bunker',
        component: {
            template: '<router-view></router-view>'
        },
        children: [
            {
                path: '',
                component: () => import('../../views/pages/bunker/Bunker'),
                // beforeEnter: AUTH.USER,
                name: 'dashboard'
            },
            {
                path: 'auth',
                beforeEnter: AUTH.GUEST,
                component: () => import('../../views/pages/Authentication'),
                children: [
                    {
                        path: 'login',
                        component: () => import('../../views/components/Login'),
                        name: 'login'
                    },
                    {
                        path: 'signup',
                        component: () => import('../../views/components/SignUp'),
                        name: 'signup'
                    }
                ]
            },
        ]
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
