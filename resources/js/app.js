// app.js
require("./bootstrap");
window.Vue = require("vue").default;

import VueRouter from "vue-router";
import VueAxios from "vue-axios";
import VueSweetalert2 from 'vue-sweetalert2';
// import _ from 'lodash'
import axios from "axios";
// import App from "./App.vue";
import 'sweetalert2/dist/sweetalert2.min.css';

// window.Vue.use(_);
window.Vue.use(VueRouter);
window.Vue.use(VueSweetalert2);
window.Vue.use(VueAxios, axios);

import HomeComponent from "./components/HomeComponent.vue";
import CreateComponent from "./components/CreateComponent.vue";
import EditComponent from "./components/EditComponent.vue";
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
const routes = [
    {
        name: "home",
        path: "/",
        component: HomeComponent,
    },
    {
        name: "create",
        path: "/create",
        component: CreateComponent,
    },
    {
        name: "edit",
        path: "/edit/:id",
        component: EditComponent,
    },
];

const router = new VueRouter({ mode: "history", routes: routes });
const app = new Vue({
	el: '#app',
	router
});
// const app = new Vue(Vue.util.extend({ router }, App)).$mount("#app");
