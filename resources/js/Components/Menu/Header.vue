<template>
    <header class="w-full bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex justify-between items-center">

            <div class="relative flex items-center justify-center w-8 h-8">
                <div class="absolute w-full h-full rounded-full bg-orange-200 opacity-50 animate-ping"></div>
                <div class="relative text-lg"><Link href="/">🔥</Link></div>
            </div>

            <div v-if="authUser" class="relative" @mouseleave="showMenu = false">

                <div
                    class="relative inline-block text-left"
                    @mouseenter="showMenu = true"
                    @mouseleave="showMenu = false"
                >
                    <button
                        class="flex items-center space-x-2 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none"
                    >
                        <span>{{ authUser.name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <transition name="fade">
                        <div
                            v-if="showMenu"
                            class="absolute right-0 top-full w-40 bg-white border border-gray-200 rounded-md shadow-lg z-10"
                        >
                            <a
                                href="/profile"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            >Profile</a>
                            <form @submit.prevent="logout">
                                <button
                                    type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                >Log Out</button>
                            </form>
                        </div>
                    </transition>
                </div>

            </div>

            <div v-else>
                <a href="/login" class="text-sm font-medium text-gray-700 hover:underline">Log In</a>
            </div>
        </div>
    </header>
</template>

<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    authUser: Object
})

const showMenu = ref(false)

function logout() {
    router.post(route('logout'))
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.2s ease;
}
.fade-enter-from, .fade-leave-to {
    opacity: 0;
}
</style>
