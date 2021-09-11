import { createWebHistory, createRouter } from "vue-router";

import About from '../pages/About.vue';
import Register from '../pages/Register.vue';
import Login from '../pages/Login.vue';

import Shops from '../components/Shops.vue';
import ExportCsv from '../components/ExportCsv.vue';

import Users from '../components/Users.vue';
import AddUser from '../components/AddUser.vue';
import EditUser from '../components/EditUser.vue';

export const routes = [{
        name: 'login',
        path: '/',
        component: Login
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
        name: 'shops',
        path: '/shops',
        component: Shops
    },
    {
        name: 'users',
        path: '/admin/users/index',
        component: Users
    },
    {
        name: 'adduser',
        path: '/admin/users/create',
        component: AddUser
    },
    {
        name: 'edituser',
        path: '/admin/users/users/edit/:id',
        component: EditUser
    },
    {
        name: 'updateuser',
        path: '/users/update/:id',
        component: EditUser
    },
    {
        name: 'shops',
        path: '/shops',
        component: Shops
    },
    {
        name: 'exportcsv',
        path: '/shops/exportcsv',
        component: ExportCsv
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;