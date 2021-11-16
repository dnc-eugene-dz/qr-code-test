import Vue from 'vue';
import VueRouter from 'vue-router';

import QR from './Pages/QR.vue';
import Login from './Pages/Auth/Login.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'qr',
            component: QR
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
    ]
});

export default router;
