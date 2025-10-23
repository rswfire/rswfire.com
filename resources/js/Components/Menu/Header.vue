<template>
    <header class="fixed top-0 left-0 w-full z-50 bg-white border-b border-gray-200 shadow-sm">



        <div class="mt-1 px-8 mx-auto max-w-6xl grid-cols-[1fr_auto] items-center page-wrap">
            <div class="bg-white border-b border-gray-100 py-1.5" style="
    mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
    -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
  ">
                <Ticker
                    :speedPxPerSec="47"
                    :gapPx="24"
                    :respectReducedMotion="false"
                    class="text-black font-medium text-sm leading-snug"
                >
            <span class="inline-flex items-center">
              <Icon name="Flame" color="text-black" class="w-[16px] h-[16px]" />
              <span class="italic text-gray-700 ml-2">"In a forest pitch dark, glowed the tiniest spark. It burst into a flame."</span>
              <span class="text-gray-600 ml-2">— <a href="https://bjork.com" class="text-red-600 hover:underline" target="_blank">Björk</a></span>
            </span>
                    <span aria-hidden="true" class="mx-4 text-gray-300">|</span>

                    <span class="inline-flex items-center text-gray-700">
              <Icon name="SquareLibrary" color="text-black" class="w-[16px] h-[16px]" />
              <Link href="/lexicon" class="ml-1 text-lexicon-600 font-semibold hover:underline">
                Lexicon
              </Link>
              <span class="ml-1">has expanded &mdash; new entries and integrated tooltips now weave the language into the whole project.</span>
            </span>
                    <span aria-hidden="true" class="mx-4 text-gray-300">|</span>

                    <span class="inline-flex items-center text-gray-700">
              <Icon name="TreeDeciduous" color="text-black" class="w-[16px] h-[16px]" /> <span class="ml-2">The</span>
              <Link href="/honeyman" class="ml-1 text-honeyman-600 font-semibold hover:underline">
                Honeyman Archive
              </Link>
              <span class="ml-1">is now complete. We await updates on the
                <Link href="/fieldcraft/01K39AD52EG9K31B48YSTH3E7X" class="ml-1 text-honeyman-600 font-semibold hover:underline">public records request</Link>.
              </span>
            </span>

                    <span aria-hidden="true" class="mx-4 text-gray-300">|</span>

                    <span class="inline-flex items-center text-gray-700">
              <Icon name="WavesLadder" color="text-black" class="w-[16px] h-[16px]" />
              <Link href="/bluewater" class="ml-1 text-blue-600 font-semibold hover:underline">
                Bluewater
              </Link>
              <span class="ml-1">underway &mdash; real preparation for exodus, now entering sea-stage recursion. Sovereignty is no longer theoretical.</span>
            </span>
                    <span aria-hidden="true" class="mx-4 text-gray-300">|</span>

                    <span class="inline-flex items-center text-gray-700">
              <Icon name="HandCoins" color="text-black" class="w-[16px] h-[16px]" /> <span class="ml-2">Please consider</span>
              <Link href="/contribute" class="ml-1 text-orange-600 font-semibold hover:underline">
                contributing
              </Link>
              <span class="ml-1">to this open-source project, thank you!</span>
            </span>
                </Ticker>
            </div>

        </div>





        <div class="max-w-6xl mx-auto page-wrap">
            <div class="grid grid-cols-[auto_1fr_auto] items-center h-14">
                <div class="flex items-center space-x-2">
                    <div class="group flex items-center space-x-2 pl-2 pr-4 rounded-full bg-orange-50 border border-orange-200">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full relative">
                            <div class="absolute w-full h-full rounded-full bg-orange-200 opacity-50 animate-ping hidden group-hover:block"></div>
                            <div class="relative text-lg leading-none text-orange-600">🔥</div>
                        </div>
                        <div class="text-sm font-semibold tracking-tight text-orange-800">
                            <Link href="/">RSWFIRE.COM</Link>
                        </div>
                    </div>
                </div>

                <nav class="flex items-center justify-center gap-3">
                    <!-- Field Section -->
                    <div
                        class="relative"
                        @mouseenter="onSectionEnter('field')"
                        @mouseleave="onSectionLeave"
                    >
                        <button class="flex items-center gap-1 px-3 py-1.5 rounded-full text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                            <Icon name="MapPinned" class="w-[20px] h-[20px] mr-1.5" />
                            <span>FIELD</span>
                            <Icon name="ChevronDown" class="w-[20px] h-[20px]" />
                        </button>

                        <transition name="dropdown">
                            <div
                                v-if="activeSection === 'field'"
                                class="absolute left-0 top-full mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden z-50"
                            >
                                <div class="h-1 bg-gradient-to-r from-red-300 via-purple-300 to-yellow-300"></div>
                                <div class="p-2 space-y-1">
                                    <Link
                                        v-for="item in fieldItems"
                                        :key="item.label"
                                        :href="item.url"
                                        class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-gray-50 transition"
                                    >
                                        <Icon :name="item.icon" :class="item.color" class="w-4 h-4 flex-shrink-0" />
                                        <span class="text-sm text-gray-800">{{ item.label }}</span>
                                    </Link>
                                </div>
                            </div>
                        </transition>
                    </div>

                    <!-- Signal Section -->
                    <div
                        class="relative"
                        @mouseenter="onSectionEnter('signal')"
                        @mouseleave="onSectionLeave"
                    >
                        <button class="flex items-center gap-1 px-3 py-1.5 rounded-full text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                            <Icon name="SquareActivity" class="w-[20px] h-[20px] mr-1.5" />
                            <span>SIGNAL</span>
                            <Icon name="ChevronDown" class="w-[20px] h-[20px]" />
                        </button>

                        <transition name="dropdown">
                            <div
                                v-if="activeSection === 'signal'"
                                class="absolute left-0 top-full mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden z-50"
                            >
                                <div class="h-1 bg-gradient-to-r from-green-300 via-pink-300 to-sky-300"></div>
                                <div class="p-2 space-y-1">
                                    <Link
                                        v-for="item in signalItems"
                                        :key="item.label"
                                        :href="item.url"
                                        class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-gray-50 transition"
                                    >
                                        <Icon :name="item.icon" :class="item.color" class="w-4 h-4 flex-shrink-0" />
                                        <span class="text-sm text-gray-800">{{ item.label }}</span>
                                    </Link>
                                </div>
                            </div>
                        </transition>
                    </div>

                    <!-- Reference Section -->
                    <div
                        class="relative"
                        @mouseenter="onSectionEnter('reference')"
                        @mouseleave="onSectionLeave"
                    >
                        <button class="flex items-center gap-1 px-3 py-1.5 rounded-full text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                            <Icon name="SquareLibrary" class="w-[20px] h-[20px] mr-1.5" />
                            <span>REFERENCE</span>
                            <Icon name="ChevronDown" class="w-[20px] h-[20px]" />
                        </button>

                        <transition name="dropdown">
                            <div
                                v-if="activeSection === 'reference'"
                                class="absolute left-0 top-full mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden z-50"
                            >
                                <div class="h-1 bg-gradient-to-r from-amber-300 via-orange-300 to-emerald-300"></div>
                                <div class="p-2 space-y-1">
                                    <Link
                                        v-for="item in referenceItems"
                                        :key="item.label"
                                        :href="item.url"
                                        class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-gray-50 transition"
                                    >
                                        <Icon :name="item.icon" :class="item.color" class="w-4 h-4 flex-shrink-0" />
                                        <span class="text-sm text-gray-800">{{ item.label }}</span>
                                    </Link>
                                </div>
                            </div>
                        </transition>
                    </div>

                    <!-- System Section -->
                    <div
                        class="relative"
                        @mouseenter="onSectionEnter('system')"
                        @mouseleave="onSectionLeave"
                    >
                        <button class="flex items-center gap-1 px-3 py-1.5 rounded-full text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                            <Icon name="SquareChevronRight" class="w-[20px] h-[20px] mr-1.5" />
                            <span>SYSTEM</span>
                            <Icon name="ChevronDown" class="w-[20px] h-[20px]" />
                        </button>

                        <transition name="dropdown">
                            <div
                                v-if="activeSection === 'system'"
                                class="absolute left-0 top-full mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden z-50"
                            >
                                <div class="h-1 bg-gradient-to-r from-amber-300 via-orange-300 to-emerald-300"></div>
                                <div class="p-2 space-y-1">
                                    <Link
                                        v-for="item in systemItems"
                                        :key="item.label"
                                        :href="item.url"
                                        class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-gray-50 transition"
                                    >
                                        <Icon :name="item.icon" :class="item.color" class="w-4 h-4 flex-shrink-0" />
                                        <span class="text-sm text-gray-800">{{ item.label }}</span>
                                    </Link>
                                </div>
                            </div>
                        </transition>
                    </div>

                </nav>




                <div class="sm:hidden lg:flex lg:items-center">
                    <div
                        v-if="authUser?.id"
                        class="relative inline-block"
                        @mouseenter="onMenuEnter"
                        @mouseleave="onMenuLeave"
                        @keydown.escape.stop.prevent="showMenu = false"
                    >
                        <button
                            type="button"
                            @click="showMenu = !showMenu"
                            class="flex items-center gap-2 text-sm font-semibold text-orange-700 bg-orange-50 hover:bg-orange-100 px-3 py-1 rounded-full border border-orange-200 transition focus:outline-none focus:ring-2 focus:ring-orange-300"
                            :aria-expanded="showMenu ? 'true' : 'false'"
                            aria-haspopup="menu"
                        >
                            <Icon name="Key" color="text-orange-600" class="w-4 h-4" />
                            <span class="hidden sm:inline truncate max-w-[14rem]">{{ authUser.name }}</span>
                            <svg
                                class="w-4 h-4 transition-transform duration-200"
                                :class="showMenu ? 'rotate-180' : 'rotate-0'"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                            >
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.06l3.71-3.83a.75.75 0 111.08 1.04l-4.24 4.38a.75.75 0 01-1.08 0L5.25 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <transition
                            enter-active-class="transition ease-out duration-150"
                            enter-from-class="opacity-0 scale-95"
                            enter-to-class="opacity-100 scale-100"
                            leave-active-class="transition ease-in duration-100"
                            leave-from-class="opacity-100 scale-100"
                            leave-to-class="opacity-0 scale-95"
                        >
                            <div
                                v-if="showMenu"
                                role="menu"
                                tabindex="-1"
                                class="absolute right-0 top-full translate-y-1 w-56 bg-white/95 backdrop-blur border border-gray-200 rounded-xl shadow-lg ring-1 ring-black/5 z-50
               before:content-[''] before:absolute before:-top-1.5 before:right-6 before:w-3 before:h-3 before:bg-white before:border before:border-gray-200 before:rotate-45 before:rounded-[2px]"
                            >
                                <div class="px-4 pt-3 pb-2">
                                    <div class="text-[11px] uppercase tracking-wide text-gray-500">Signed in as</div>
                                    <div class="mt-0.5 text-sm font-medium text-gray-900 truncate">{{ authUser.email }}</div>
                                </div>

                                <div class="my-2 h-px bg-gray-100"></div>

                                <a href="/profile"
                                   role="menuitem"
                                   class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 focus:bg-gray-50 focus:outline-none">
                                    <Icon name="User" color="text-gray-700" class="w-4 h-4" />
                                    Profile
                                </a>

                                <button
                                    role="menuitem"
                                    @click.stop.prevent="handleLogout"
                                    class="w-full text-left flex items-center gap-2 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 focus:bg-red-50 focus:outline-none">
                                    <Icon name="LogOut" color="text-red-600" class="w-4 h-4" />
                                    Log Out
                                </button>

                                <div class="pb-1"></div>
                            </div>
                        </transition>
                    </div>

                    <div v-else class="sm:hidden lg:flex">
                        <Link
                            href="/login"
                            class="flex items-center gap-2 text-xs font-semibold text-yellow-700 bg-yellow-50 hover:bg-yellow-100 px-3 py-1 rounded-full border border-yellow-200 transition focus:outline-none focus:ring-2 focus:ring-yellow-300"
                        >
                            <Icon name="Key" color="text-yellow-600" class="w-4 h-4" />
                            <span class="hidden sm:inline">Authenticate</span>
                        </Link>
                    </div>
                </div>
            </div>


        </div>
    </header>
</template>

<script setup>
import { Link } from "@inertiajs/vue3"
import { ref, computed } from "vue"
import Icon from "@/Components/System/Icon.vue"
import Ticker from "@/Components/Menu/Ticker.vue"
import { useTheme } from "@/Composables/useTheme"

const { themesBySection } = useTheme()

// Section dropdown state
const activeSection = ref(null)
let sectionEnterTimer = null
let sectionLeaveTimer = null

// Auth menu state
const showMenu = ref(false)
let menuEnterTimer = null
let menuLeaveTimer = null

// Section items from theme composable
const fieldItems = computed(() =>
    themesBySection.value.field.map(t => ({
        label: t.label,
        icon: t.icon,
        color: t.color,
        url: t.url
    }))
)

const signalItems = computed(() =>
    themesBySection.value.signal.map(t => ({
        label: t.label,
        icon: t.icon,
        color: t.color,
        url: t.url
    }))
)

const referenceItems = computed(() =>
    themesBySection.value.reference.map(t => ({
        label: t.label,
        icon: t.icon,
        color: t.color,
        url: t.url
    }))
)
const systemItems = computed(() =>
    themesBySection.value.system.map(t => ({
        label: t.label,
        icon: t.icon,
        color: t.color,
        url: t.url
    }))
)


// Section dropdown hover handlers
function onSectionEnter(section) {
    if (sectionLeaveTimer) {
        window.clearTimeout(sectionLeaveTimer)
        sectionLeaveTimer = null
    }
    sectionEnterTimer = window.setTimeout(() => {
        activeSection.value = section
    }, 80)
}

function onSectionLeave() {
    if (sectionEnterTimer) {
        window.clearTimeout(sectionEnterTimer)
        sectionEnterTimer = null
    }
    sectionLeaveTimer = window.setTimeout(() => {
        activeSection.value = null
    }, 120)
}

// Auth menu hover handlers
function onMenuEnter() {
    if (menuLeaveTimer) {
        window.clearTimeout(menuLeaveTimer)
        menuLeaveTimer = null
    }
    menuEnterTimer = window.setTimeout(() => {
        showMenu.value = true
    }, 80)
}

function onMenuLeave() {
    if (menuEnterTimer) {
        window.clearTimeout(menuEnterTimer)
        menuEnterTimer = null
    }
    menuLeaveTimer = window.setTimeout(() => {
        showMenu.value = false
    }, 120)
}

const props = defineProps({
    authUser: Object
})

const emit = defineEmits(['logout'])

function handleLogout() {
    showMenu.value = false
    emit('logout')
}
</script>

<style scoped>
.dropdown-enter-active,
.dropdown-leave-active {
    transition: opacity 200ms ease, transform 200ms ease;
}
.dropdown-enter-from,
.dropdown-leave-to {
    opacity: 0;
    transform: translateY(-8px);
}
</style>
