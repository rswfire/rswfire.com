import { createInertiaApp } from '@inertiajs/vue3'
import createServer from '@inertiajs/server'
import { createSSRApp, h } from 'vue'
import { renderToString } from '@vue/server-renderer'
import { resolvePageComponent } from './resolve-pages'

const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })

createServer((page) =>
    createInertiaApp({
        page,
        render: renderToString,
        resolve: (name) => resolvePageComponent(name, pages),
        setup({ App, props, plugin }) {
            return createSSRApp({ render: () => h(App, props) }).use(plugin)
        },
    })
)
