import { createWebHistory, createRouter } from "vue-router";

import Home from '../pages/Home.vue';
import About from '../pages/About.vue';
import Register from '../pages/Register.vue';
import Login from '../pages/Login.vue';
import Dashboard from '../pages/Dashboard.vue';

import Users from '../components/Users.vue';
import AddUser from '../components/AddUser.vue';
import EditUser from '../components/EditUser.vue';

export const routes = [{
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'users',
        path: '/users',
        component: Users
    },
    {
        name: 'adduser',
        path: '/users/add',
        component: AddUser
    },
    {
        name: 'edituser',
        path: '/users/edit/:id',
        component: EditUser
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;