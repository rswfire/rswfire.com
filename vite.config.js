import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    build: {
        outDir: "public/assets",
        emptyOutDir: true,
        manifest: "manifest.json",
    },
    plugins: [
        laravel({
            input: "resources/js/app.js",
            refresh: true,
            ssr: "resources/js/ssr.js",
            buildDirectory: "assets",
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    ssr: {
        noExternal: ["@inertiajs/server"],
    },
});
