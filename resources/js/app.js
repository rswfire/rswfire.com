import { createApp } from "vue";
import App from "./pages/App.vue";
import "../css/app.css";
import router from './router';
import VueGtag from 'vue-gtag-next';

const app = createApp(App);

const gtagId = 'G-5K6H8GR1Q7';

app.use(router);
app.use(VueGtag, {
    property: {
        id: gtagId,
    },
    config: {
        send_page_view: true
    }
});

app.mount("#app");
