import { createInertiaApp } from '@inertiajs/vue3'
import createServer from '@inertiajs/server'
import { createSSRApp, h } from 'vue'
import { renderToString } from '@vue/server-renderer'
import { resolvePageComponent } from './resolve-pages.js'

const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })

createServer((page) => {
    console.log('🌀 [SSR] Rendering page:', page.component)

    return createInertiaApp({
        page,
        render: renderToString,
        resolve: (name) => {
            console.log('🔍 [SSR] Resolving component:', name)
            return resolvePageComponent(name, pages)
        },
        setup({ App, props, plugin }) {
            console.log('⚙️ [SSR] Setting up app with props:', Object.keys(props))
            return createSSRApp({ render: () => h(App, props) }).use(plugin)
        },
    })
})
