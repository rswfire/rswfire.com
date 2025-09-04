import "../css/app.css";
import "./bootstrap";
import "tippy.js/dist/tippy.css";

import axios from "axios";
import DefaultLayout from "./Layouts/DefaultLayout.vue";
import tippy from "tippy.js";

import { createInertiaApp, router } from "@inertiajs/vue3";
import { createApp, h, nextTick } from "vue";
import { ZiggyVue } from "ziggy-js";

const appName = import.meta.env.VITE_APP_NAME || "rswfire";

const lexiconCache = new Map();

function makeTooltipNode(entry) {
    const wrapper = document.createElement("div");
    wrapper.className = "lexicon-tooltip flex gap-3";
    wrapper.style.fontSize = "14px";

    const iconWrap = document.createElement("div");
    iconWrap.className = "flex-shrink-0";
    iconWrap.innerHTML = `
    <svg class="w-8 h-8 text-lexicon-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"/>
    </svg>
  `;

    const body = document.createElement("div");
    body.className = "flex-1";

    const termEl = document.createElement("p");
    termEl.className = "font-semibold text-gray-900 mb-1";
    termEl.innerText = entry.lexicon_term ?? "";

    const essenceEl = document.createElement("p");
    essenceEl.className = "text-sm text-gray-700 leading-snug";
    essenceEl.innerText = entry.lexicon_essence ?? "";

    const linkEl = document.createElement("a");
    linkEl.className = "text-lexicon-600 text-sm font-medium mt-2 block hover:underline";
    linkEl.href = `/lexicon/${entry.lexicon_slug}`;
    linkEl.innerText = "View Full Entry →";

    body.append(termEl, essenceEl, linkEl);
    wrapper.append(iconWrap, body);
    return wrapper;
}

window.createLexiconTooltip = async (element, term) => {
    try {
        if (!term) return;
        let entry = lexiconCache.get(term);
        if (!entry) {
            const res = await axios.get(`/api/lexicon/lookup/${encodeURIComponent(term)}`);
            entry = res.data;
            if (entry) lexiconCache.set(term, entry);
        }
        if (!entry) return;

        element.classList.add(
            "underline","decoration-dotted","cursor-help","inline-flex","items-center","gap-1","whitespace-nowrap"
        );

        if (element._tippy) return;

        tippy(element, {
            content: makeTooltipNode(entry),
            allowHTML: true,
            interactive: true,
            placement: "top",
            delay: [100, 300],
            maxWidth: 350,
            arrow: true
        });
    } catch (err) {
        console.warn(`Lexicon entry for "${term}" not found.`);
    }
};

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        const page = pages[`./Pages/${name}.vue`];

        if (!("layout" in page.default)) {
            page.default.layout = DefaultLayout;
        }
        return page;
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue);

        app.directive("lexicon-content", {
            mounted(el) {
                const placeholders = el.querySelectorAll(".lexicon-placeholder");
                placeholders.forEach((placeholder) => {
                    const term = placeholder.getAttribute("data-lexicon-term");
                    createLexiconTooltip(placeholder, term);
                });
            },
            updated(el) {
                const placeholders = el.querySelectorAll(".lexicon-placeholder");
                placeholders.forEach((placeholder) => {
                    const term = placeholder.getAttribute("data-lexicon-term");
                    if (!placeholder._tippy) {
                        createLexiconTooltip(placeholder, term);
                    }
                });
            },
            unmounted(el) {
                const tips = el.querySelectorAll(".lexicon-placeholder");
                tips.forEach((node) => {
                    if (node._tippy) node._tippy.destroy();
                });
            }
        });

        const mountedApp = app.mount(el);

        function sendPageView() {
            if (typeof window.gtag !== "function") return;
            window.gtag("event", "page_view", {
                page_title: document.title,
                page_location: window.location.href,
                page_path: window.location.pathname + window.location.search
            });
        }

        nextTick(sendPageView);

        router.on("navigate", async () => {
            await nextTick();
            sendPageView();
        });

        return mountedApp;
    },
    progress: { color: "#4B5563" }
});
