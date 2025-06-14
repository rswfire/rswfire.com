<template>
    <header class="fixed top-0 left-0 w-full z-50 bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-6xl mx-auto h-16 flex justify-between items-center">

            <!-- Outer container that holds both logo + nav -->
            <div class="flex items-center space-x-2 py-2">

                <!-- Flame + rswfire.com block -->
                <div class="flex items-center space-x-2 pl-2 pr-4 py-0 rounded-full bg-orange-50 border border-orange-200">
                    <div class="w-10 h-10 flex items-center justify-center rounded-full relative">
                        <div class="absolute w-full h-full rounded-full bg-orange-200 opacity-50 animate-ping"></div>
                        <div class="relative text-lg leading-none text-orange-600">🔥</div>
                    </div>
                    <div class="text-sm font-semibold tracking-tight text-orange-800">
                        <Link href="/">RSWFIRE.COM</Link>
                    </div>
                </div>

                <!-- Nav icons (visually separate group) -->
                <nav class="flex items-center gap-2 px-2 py-1">
                    <div
                        v-for="item in items"
                        :key="item.label"
                        @mouseenter="hovered = item.label"
                        @mouseleave="hovered = null"
                        class="group inline-flex items-center px-2 py-1 transition-all duration-300 ease-in-out rounded-full"
                    >
                        <Link :href="item.url" class="flex items-center space-x-2">
                            <!-- Icon (always visible) -->
                            <Icon :name="item.icon" :color="item.color" class="flex-shrink-0" />

                            <!-- Label (reveals smoothly without fixed width) -->
                            <transition name="fade-width">
        <span
            v-if="hovered === item.label"
            class="text-sm whitespace-nowrap text-gray-800"
        >
          {{ item.label }}
        </span>
                            </transition>
                        </Link>
                    </div>
                </nav>


            </div>









            <!-- Auth menu -->
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
                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
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
import { Link } from "@inertiajs/vue3"
import Icon from "@/Components/System/Icon.vue"

const hovered = ref(null)
const showMenu = ref(false)

const items = [
    { label: 'Home', icon: 'Radar', color: 'text-indigo-400', url: "/" },
    { label: 'Who I Am', icon: 'Flame', color: 'text-orange-400', url: "/hello" },
    { label: 'What I Do', icon: 'Hammer', color: 'text-purple-400', url: "/tech" },
    { label: 'Signal', icon: 'Activity', color: 'text-sky-400', url: "/signal" },
    { label: 'Transmission', icon: 'SatelliteDish', color: 'text-pink-400', url: "/transmission" },
    { label: 'Fieldwork', icon: 'Map', color: 'text-green-500', url: "/fieldwork" },
    { label: 'Myth', icon: 'ShieldCheck', color: 'text-yellow-400', url: "/myth" },
    { label: 'Lexicon', icon: 'Library', color: 'text-emerald-400', url: "/lexicon" },
    { label: 'Honeyman', icon: 'AlertOctagon', color: 'text-red-500', url: "/honeyman" }
]

const props = defineProps({
    authUser: Object
})

function logout() {
    router.post(route('logout'))
}
</script>

<style scoped>
.fade-width-enter-active,
.fade-width-leave-active {
    transition: opacity 250ms ease, max-width 300ms ease, transform 250ms ease;
    max-width: 160px;
}

.fade-width-enter-from,
.fade-width-leave-to {
    opacity: 0;
    max-width: 0;
    overflow: hidden;
    transform: translateX(-8px);
}
</style>
