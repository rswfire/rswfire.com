import '../css/app.css';
import './bootstrap';


import { createInertiaApp } from '@inertiajs/vue3';
import { createApp, h } from 'vue';
import { ZiggyVue } from 'ziggy-js';
import DefaultLayout from './Layouts/DefaultLayout.vue';
import { createHead } from '@vueuse/head';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
const head = createHead();

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        const page = pages[`./Pages/${name}.vue`];

        page.default.layout ??= DefaultLayout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(head)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
