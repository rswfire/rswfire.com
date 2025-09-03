import '../css/app.css';
import './bootstrap';
import 'tippy.js/dist/tippy.css'
import tippy from 'tippy.js'
import axios from 'axios'

import { createInertiaApp } from '@inertiajs/vue3';
import { createApp, h } from 'vue';
import { ZiggyVue } from 'ziggy-js';
import DefaultLayout from './Layouts/DefaultLayout.vue';

const appName = import.meta.env.VITE_APP_NAME || 'rswfire';

// Global lexicon tooltip function
window.createLexiconTooltip = async (element, term) => {
    try {
        const res = await axios.get(`/api/lexicon/lookup/${encodeURIComponent(term)}`)
        const entry = res.data

        if (entry) {
            // Add styling classes to the element
            element.classList.add('underline', 'decoration-dotted', 'cursor-help', 'inline-flex', 'items-center', 'gap-1', 'whitespace-nowrap')

            tippy(element, {
                content: `
    <div class="lexicon-tooltip flex gap-3" style="font-size: 14px;">
      <div class="flex-shrink-0">
        <svg class="w-8 h-8 text-lexicon-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"/>
        </svg>
      </div>
      <div class="flex-1">
        <p class="font-semibold text-gray-900 mb-1">${entry.lexicon_term}</p>
        <p class="text-sm text-gray-700 leading-snug">${entry.lexicon_essence}</p>
        <a href="/lexicon/${entry.lexicon_slug}" class="text-lexicon-600 text-sm font-medium mt-2 block hover:underline">
          View Full Entry →
        </a>
      </div>
    </div>
  `,
                allowHTML: true,
                interactive: true,
                placement: 'top',
                delay: [100, 300],
                maxWidth: 350,
                arrow: true,
            })
        }
    } catch (err) {
        console.warn(`Lexicon entry for "${term}" not found.`)
    }
}

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        const page = pages[`./Pages/${name}.vue`];

        if (!('layout' in page.default)) {
            page.default.layout = DefaultLayout;
        }

        return page;
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue);

        // Add the global directive
        app.directive('lexicon-content', {
            mounted(el) {
                const placeholders = el.querySelectorAll('.lexicon-placeholder')
                placeholders.forEach(placeholder => {
                    const term = placeholder.getAttribute('data-lexicon-term')
                    createLexiconTooltip(placeholder, term)
                })
            },
            updated(el) {
                const placeholders = el.querySelectorAll('.lexicon-placeholder')
                placeholders.forEach(placeholder => {
                    const term = placeholder.getAttribute('data-lexicon-term')
                    if (!placeholder._tippy) { // Don't create duplicate tooltips
                        createLexiconTooltip(placeholder, term)
                    }
                })
            }
        });

        return app.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
