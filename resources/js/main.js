require('./bootstrap');
import {createApp} from "vue";
import router from "./router";
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap/dist/js/bootstrap.bundle';
import App from "./App"

createApp(App).use(router).mount("#app")
