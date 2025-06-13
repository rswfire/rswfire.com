<template>
    <Header :authUser="authUser" />
    <div class="md:hidden">
        <div class="flex items-center justify-between p-3 sticky top-0 z-50 bg-white border-b border-gray-300">
            <div class="flex items-center gap-3">
                <img
                    src="/assets/rswfire.jpg"
                    alt="RSWFIRE"
                    class="w-16 h-16 rounded-full border border-gray-800 shadow-sm"
                />
                <div class="flex flex-col">
                    <div class="text-sm font-semibold tracking-wide text-gray-800">RSWFIRE 🔥</div>
                    <div class="text-xs text-gray-800 uppercase">ROBERT SAMUEL WHITE</div>

                </div>
            </div>

            <button
                @click="menuOpen = true"
                class="flex items-center gap-2 px-4 py-2 rounded-md border border-gray-300 text-sm text-gray-700 hover:bg-red-50 hover:border-red-400 hover:text-red-600 transition"
                aria-label="Open menu"
            >
                <span class="text-lg">☰</span>
                <span class="text-sm font-semibold uppercase tracking-wide">Menu</span>
            </button>
        </div>

        <MobileNav v-if="menuOpen" @close="menuOpen = false" />
        <div class="p-3">
            <slot />
        </div>
    </div>

    <div class="hidden md:block">
        <div class="min-h-screen bg-white px-4 py-8 sm:px-6 sm:py-12">
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-[300px_1fr] gap-10">

                <MenuProfile/>

                <div class="flex flex-col">
                    <slot />
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import {computed, ref} from "vue";
import Header from "@/Components/Menu/Header.vue";
import MobileNav from "@/Components/Menu/Panel.vue";
import { useMeta } from '../Components/useMeta.ts'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const authUser = computed(() => page.props.auth?.user)


useMeta({
    title: 'rswfire.com',
    description: 'Robert Samuel White',
    keywords: 'rswfire',
    image: '',
    url: 'https://rswfire.com/',
    type: 'article',
})

const menuOpen = ref(false);

import MenuProfile from "@/Components/Menu/Profile.vue";
</script>

<style>

</style>
