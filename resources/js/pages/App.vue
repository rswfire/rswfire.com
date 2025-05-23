<template>

    <div class="md:hidden">
        <div class="flex items-center justify-between p-1">
            <div class="flex items-center gap-3">
                <img
                    src="/public/assets/rswfire.jpg"
                    alt="RSWFIRE"
                    class="w-8 h-8 rounded-full border border-gray-300 shadow-sm"
                />
                <span class="text-sm font-semibold tracking-wide text-gray-800 uppercase">RSWFIRE</span>
            </div>

            <button
                @click="sidebarOpen = true"
                class="flex items-center gap-2 px-4 py-2 rounded-md border border-gray-300 text-sm text-gray-700 hover:bg-red-50 hover:border-red-400 hover:text-red-600 transition"
            >
                <span class="text-xl">☰</span>
                <span class="text-sm font-semibold uppercase tracking-wide">Menu</span>
            </button>

        </div>

        <SidebarDrawer v-if="sidebarOpen" @close="sidebarOpen = false" />
        <div class="p-3">
            <router-view/>
        </div>

    </div>

    <div class="hidden md:block">
        <div class="min-h-screen bg-white px-4 py-8 sm:px-6 sm:py-12">
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-[250px_1fr] gap-10">

                <SidebarProfile/>

                <div class="flex flex-col">
                    <router-view />
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import { ref } from "vue"
import SidebarDrawer from "@/components/sidebar/Drawer.vue"

const sidebarOpen = ref(false)

import SidebarProfile from "@/components/sidebar/Profile.vue";
</script>

<style>

</style>
