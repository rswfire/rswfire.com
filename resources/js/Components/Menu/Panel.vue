<template>
    <div
        class="fixed inset-0 z-50 bg-white text-gray-900 flex flex-col overflow-y-auto"
        role="dialog"
        aria-modal="true"
    >

        <!-- Header -->
        <div class="sticky top-0 bg-white border-b border-gray-200 px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <Icon name="Flame" color="text-orange-600" class="w-6 h-6" />
                <span class="text-sm font-semibold tracking-tight text-orange-800">RSWFIRE.COM</span>
            </div>
            <button
                @click="$emit('close')"
                class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 transition"
                aria-label="Close menu"
            >
                <Icon name="X" class="w-5 h-5 text-gray-600" />
            </button>
        </div>

        <!-- Content -->
        <div class="flex-1 px-4 py-6 space-y-8">

            <!-- Field Section -->
            <div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 px-2">Field</h3>
                <div class="space-y-2">
                    <Link
                        v-for="item in fieldItems"
                        :key="item.label"
                        :href="item.url"
                        @click="$emit('close')"
                        class="flex items-center gap-3 px-3 py-3 rounded-lg border-l-4 transition"
                        :class="[item.bg, item.border, item.hover]"
                    >
                        <Icon :name="item.icon" :class="['w-5 h-5 flex-shrink-0', item.color]" />
                        <div class="flex-1">
                            <div class="text-sm font-medium text-gray-900">{{ item.label }}</div>
                            <div class="text-xs text-gray-500 mt-0.5">{{ item.blurb }}</div>
                        </div>
                    </Link>
                </div>
            </div>

            <!-- Signal Section -->
            <div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 px-2">Signal</h3>
                <div class="space-y-2">
                    <Link
                        v-for="item in signalItems"
                        :key="item.label"
                        :href="item.url"
                        @click="$emit('close')"
                        class="flex items-center gap-3 px-3 py-3 rounded-lg border-l-4 transition"
                        :class="[item.bg, item.border, item.hover]"
                    >
                        <Icon :name="item.icon" :class="['w-5 h-5 flex-shrink-0', item.color]" />
                        <div class="flex-1">
                            <div class="text-sm font-medium text-gray-900">{{ item.label }}</div>
                            <div class="text-xs text-gray-500 mt-0.5">{{ item.blurb }}</div>
                        </div>
                    </Link>
                </div>
            </div>

            <!-- Reference Section -->
            <div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 px-2">Reference</h3>
                <div class="space-y-2">
                    <Link
                        v-for="item in referenceItems"
                        :key="item.label"
                        :href="item.url"
                        @click="$emit('close')"
                        class="flex items-center gap-3 px-3 py-3 rounded-lg border-l-4 transition"
                        :class="[item.bg, item.border, item.hover]"
                    >
                        <Icon :name="item.icon" :class="['w-5 h-5 flex-shrink-0', item.color]" />
                        <div class="flex-1">
                            <div class="text-sm font-medium text-gray-900">{{ item.label }}</div>
                            <div class="text-xs text-gray-500 mt-0.5">{{ item.blurb }}</div>
                        </div>
                    </Link>
                </div>
            </div>

            <!-- System Section -->
            <div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3 px-2">System</h3>
                <div class="space-y-2">
                    <Link
                        v-for="item in systemItems"
                        :key="item.label"
                        :href="item.url"
                        @click="$emit('close')"
                        class="flex items-center gap-3 px-3 py-3 rounded-lg border-l-4 border-gray-200 hover:bg-gray-50 transition"
                    >
                        <Icon :name="item.icon" class="w-4 h-4 text-gray-600 flex-shrink-0" />
                        <div class="flex-1">
                            <div class="text-sm font-medium text-gray-900">{{ item.label }}</div>
                            <div class="text-xs text-gray-500 mt-0.5">{{ item.blurb }}</div>
                        </div>
                    </Link>
                </div>
            </div>

            <!-- Auth Section -->
            <div v-if="authUser?.id" class="pt-4 border-t border-gray-200">
                <div class="px-3 py-2 mb-2">
                    <div class="text-xs text-gray-500">Signed in as</div>
                    <div class="text-sm font-medium text-gray-900 truncate">{{ authUser.email }}</div>
                </div>
                <div class="space-y-1">
                    <Link
                        href="/profile"
                        @click="$emit('close')"
                        class="flex items-center gap-2 px-3 py-2.5 rounded-lg hover:bg-gray-50 transition"
                    >
                        <Icon name="User" class="w-4 h-4 text-gray-600" />
                        <span class="text-sm font-medium text-gray-800">Profile</span>
                    </Link>
                    <button
                        @click="handleLogout"
                        class="w-full flex items-center gap-2 px-3 py-2.5 rounded-lg hover:bg-red-50 transition text-left"
                    >
                        <Icon name="LogOut" class="w-4 h-4 text-red-600" />
                        <span class="text-sm font-medium text-red-600">Log Out</span>
                    </button>
                </div>
            </div>

            <div v-else class="pt-4 border-t border-gray-200">
                <Link
                    href="/login"
                    @click="$emit('close')"
                    class="flex items-center justify-center gap-2 px-4 py-3 rounded-lg bg-orange-50 border border-orange-200 hover:bg-orange-100 transition"
                >
                    <Icon name="Key" class="w-4 h-4 text-orange-600" />
                    <span class="text-sm font-semibold text-orange-700">Authenticate</span>
                </Link>
            </div>

        </div>

        <!-- Footer Quote -->
        <div class="border-t border-gray-200 px-4 py-6 text-center">
            <div class="flex items-center justify-center gap-2 mb-2">
                <Icon name="Flame" class="w-4 h-4 text-red-400" />
            </div>
            <div class="text-xs italic text-gray-600 leading-relaxed">
                "In a forest pitch dark,<br />
                glowed the tiniest spark.<br />
                It burst into a flame."
            </div>
            <div class="text-xs text-gray-400 mt-2">— Björk</div>
        </div>
    </div>

</template>

<script setup>
import { computed } from "vue"
import { Link } from "@inertiajs/vue3"
import Icon from "@/Components/System/Icon.vue"
import { useTheme } from "@/Composables/useTheme"
const appConfig = window.appConfig;
const { themesBySection } = useTheme()

const props = defineProps({
    authUser: { type: Object, default: null }
})

const emit = defineEmits(['close', 'logout'])

const fieldItems = computed(() => themesBySection.value.field)
const signalItems = computed(() => themesBySection.value.signal)
const referenceItems = computed(() => themesBySection.value.reference)
const systemItems = computed(() => themesBySection.value.system)
console.log(fieldItems.value)
function handleLogout() {
    emit('logout')
    emit('close')
}
</script>
