<template>

    <div class="text-sm text-gray-600 border-t border-gray-200 pt-4">
        <div class="text-xs uppercase font-semibold text-gray-500 mb-2 tracking-wider">Navigation</div>

        <div class="">
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-1">
                <Link
                    v-for="item in navItems"
                    :key="item.to"
                    :href="item.to"
                    class="flex flex-col items-center p-2 rounded-lg shadow hover:bg-gray-100 transition"
                >
                    <div class="text-3xl">{{ item.icon }}</div>
                    <div class="text-sm mt-1 text-center">{{ item.label }}</div>
                </Link>
            </div>
        </div>

    </div>

    <div class="mt-5 text-center">
        <a href="https://github.com/rswfire/rswfire.com" target="_blank">Source Code at GitHub</a>
    </div>
</template>

<script setup>
    import { Link } from "@inertiajs/vue3";
    import {defineComponent} from "vue";

    const navItems = [
        { icon: "🏠", label: "Home", to: "/" },
        { icon: "👤", label: "Who I Am", to: "/hello" },
        { icon: "🛠️", label: "What I Do", to: "/tech" },
        { icon: "♾️", label: "Signal", to: "/signal" },
        { icon: "📹", label: "Transmission", to: "/transmission" },
        { icon: "🌱", label: "Fieldwork", to: "/fieldwork" },
        { icon: "🔥", label: "The Myth", to: "/myth" },
        { icon: "🔐", label: "Lexicon", to: "/lexicon" },
        { icon: "🌲", label: "Honeyman", to: "/honeyman" },

    ]

</script>

<style>

</style>
