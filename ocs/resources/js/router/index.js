import { createWebHistory, createRouter } from "vue-router";

import Home from "../views/Home";
import About from "../views/About";
import Registration from "../views/Registration";
import Login from "../views/Login";
import Product from "../views/Product";

export const routes = [
    {
        name: "home",
        path: "/",
        component: Home,
    },
    {
        name: "about",
        path: "/about",
        component: About,
    },
    {
        name: "registration",
        path: "/register",
        component: Registration,
    },
    {
        name: "login",
        path: "/login",
        component: Login,
    },
    {
        name: "Product",
        path: "/products/:id",
        component: Product,
        props: true,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
