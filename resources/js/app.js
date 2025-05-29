import { createApp } from "vue";
import App from "./pages/App.vue";
import "../css/app.css";
import router from './router';
import VueGtag from 'vue-gtag-next';

import Content from './components/system/Content.vue'
import Hero from './components/system/Hero.vue'
import Para from './components/system/Para.vue'
import YoutubePlayer from './components/system/YoutubePlayer.vue'

const app = createApp(App);

app.component('Content', Content);
app.component('Hero', Hero);
app.component('Para', Para);
app.component("YoutubePlayer", YoutubePlayer);

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
