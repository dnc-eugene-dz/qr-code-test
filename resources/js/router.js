import Vue from 'vue';
import VueRouter from 'vue-router';

import QR from './Pages/QR.vue';
import Login from './Pages/Auth/Login.vue';
import Register from "./Pages/Auth/Register";

Vue.use(VueRouter);

const guard = async (to, from, next) => {
    try {
        const response = await axios.get('/api/user');
        next()
    } catch (error) {
        next({ name: 'login' })
    }
}

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'qr',
            component: QR,
            beforeEnter: guard
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        },
    ]
});

export default router;
