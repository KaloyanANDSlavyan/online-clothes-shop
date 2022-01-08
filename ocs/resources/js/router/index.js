import { createWebHistory, createRouter } from "vue-router";

import Home from "../views/Home";
import About from "../views/About";
import Registration from "../views/Registration";
import Login from "../views/Login";
import ProductPage from "../views/ProductPage";
import Men from "../views/Men";
import Women from "../views/Women";

export const routes = [
    {
        name: "Home",
        path: "/",
        component: Home,
    },
    {
        name: "About",
        path: "/about",
        component: About,
    },
    {
        name: "Register",
        path: "/register",
        component: Registration,
    },
    {
        name: "Login",
        path: "/login",
        component: Login,
    },
    {
        name: "ProductPage",
        path: "/products/:id",
        component: ProductPage,
        props: true,
    },
    {
        name: "Women",
        path: "/products/women",
        component: Women,
        props: true,
    },
    {
        name: "Men",
        path: "/products/men",
        component: Men,
        props: true,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
