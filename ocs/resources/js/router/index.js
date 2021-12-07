import { createWebHistory, createRouter } from "vue-router";

import Home from "../views/Home";
import About from "../views/About";

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
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
