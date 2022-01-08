import { createApp } from "vue";

require("./bootstrap");
import App from "./App.vue";
import axios from "axios";
import router from "./router";
import mitt from 'mitt';

const emitter = mitt();
const app = createApp(App);
app.config.globalProperties.$axios = axios;
app.config.globalProperties.emitter = emitter;
app.use(router);
app.mount("#app");
