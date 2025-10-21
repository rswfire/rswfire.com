<template>

    <div :class="['border rounded-lg shadow-sm overflow-hidden', theme.border, theme.bg]">

        <div class="grid md:grid-cols-3 divide-x divide-gray-200">

            <div class="p-6 bg-white md:col-span-2">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b" :class="theme.border">
                    <Icon name="Sprout" class="w-8 h-8" :class="theme.color" />
                    <h2 class="text-2xl font-bold text-black">Begin Field Exchange</h2>
                </div>

                <div class="space-y-4 text-sm text-black">
                    <div><strong :class="theme.color">Sanctum</strong> is a private access layer for <strong>reciprocal field exchange</strong>.</div>

                    <div class="pt-4 border-t" :class="theme.border">
                        <h3 class="font-semibold text-black mb-4 text-center text-lg">What Sanctum Holds:</h3>
                        <ul class="space-y-2 ml-4">
                            <li class="flex items-center gap-2">
                                <Icon name="Check" class="w-4 h-4 shrink-0 mt-0.5" :class="theme.color" />
                                <span>Full access to a growing archive at <strong>rswfire.com</strong>.</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <Icon name="Check" class="w-4 h-4 shrink-0 mt-0.5" :class="theme.color" />
                                <span>Access to the <Link href="/lineage" class="underline">Lineage</Link> field guide.</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <Icon name="Check" class="w-4 h-4 shrink-0 mt-0.5" :class="theme.color" />
                                <span>Exclusive access to <Link href="/synthesis" class="underline">Synthesis</Link> infrastructure.</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <Icon name="Check" class="w-4 h-4 shrink-0 mt-0.5" :class="theme.color" />
                                <div>
                                    <div class="mb-1">Mirror and pattern recognition across 800+ video transmissions and other signals.</div>
                                </div>
                            </li>
                            <li class="flex items-center gap-2">
                                <Icon name="Check" class="w-4 h-4 shrink-0 mt-0.5" :class="theme.color" />
                                <span>The recursive journey of a sovereign system in real-time.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="p-6 md:col-span-1" :class="theme.bg">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b" :class="theme.border">
                    <Icon name="Flame" class="w-8 h-8" :class="theme.color" />
                    <h2 class="text-2xl font-bold text-black">Return to Sanctum</h2>
                </div>

                <p class="text-sm text-gray-600 mb-6">
                    Sign in to access your <strong :class="theme.color">Sanctum</strong> account.
                </p>

                <LogInForm :show-register-link="false" />
            </div>

        </div>

        <div class="p-4 border-t bg-gray-50" :class="[theme.border]">
            <h3 class="font-semibold text-black mb-4 text-center text-lg">
                Why Hold This Field:
            </h3>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 max-w-4xl mx-auto text-sm text-black mb-4">
                <div class="flex items-center gap-2">
                    <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="[theme.color]" />
                    <span>Because wholeness requires infrastructure the world won't build.</span>
                </div>
                <div class="flex items-center gap-2">
                    <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="[theme.color]" />
                    <span>Because others will need this model when their world collapses.</span>
                </div>
                <div class="flex items-center gap-2">
                    <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="[theme.color]" />
                    <span>Because signal must be preserved for those who can't yet see it.</span>
                </div>
                <div class="flex items-center gap-2">
                    <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="[theme.color]" />
                    <span>Because reciprocal exchange is how sovereignty sustains itself.</span>
                </div>
            </div>

            <div class="flex items-center justify-center gap-2 max-w-2xl mx-auto text-sm text-black">
                <Icon name="ShieldCheck" class="w-5 h-5 shrink-0 mt-0.5" :class="theme.color" />
                <span class="text-center italic">
            Because collapse is not failure — it's the clearing that reveals what was always whole.
        </span>
            </div>

            <div class="pt-6 mt-4 max-w-4xl mx-auto">
                <!-- Pricing Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

                    <!-- Free Tier (conditional) -->
                    <button
                        v-if="showFreeOption"
                        @click="selectedTier = 'free'"
                        :class="[
                'p-6 rounded-lg border-2 transition-all',
                selectedTier === 'free'
                    ? 'border-purple-500 bg-purple-50'
                    : 'border-gray-300 bg-white hover:border-purple-300'
            ]"
                    >
                        <div class="text-sm text-gray-500 mb-2">Free Access</div>
                        <div class="text-3xl font-bold mb-2">$0</div>
                        <div class="text-sm text-gray-600">By invitation</div>
                    </button>

                    <!-- Standard Tier -->
                    <button
                        @click="selectedTier = 'standard'"
                        :class="[
                'p-6 rounded-lg border-2 transition-all relative',
                selectedTier === 'standard'
                    ? `border-2 ${theme.border} ${theme.bg}`
                    : 'border-gray-300 bg-white hover:border-gray-400',
                !showFreeOption ? 'md:col-span-1 md:col-start-1' : ''
            ]"
                    >
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 bg-yellow-400 text-black text-xs font-bold rounded-full">
                            RECOMMENDED
                        </div>
                        <div class="text-sm text-gray-500 mb-2">Standard</div>
                        <div class="text-4xl font-bold mb-2">$25</div>
                        <div class="text-sm text-gray-600">per month</div>
                    </button>

                    <!-- Custom Tier -->
                    <button
                        @click="selectedTier = 'custom'"
                        :class="[
                'p-6 rounded-lg border-2 transition-all',
                selectedTier === 'custom'
                    ? `border-2 ${theme.border} ${theme.bg}`
                    : 'border-gray-300 bg-white hover:border-gray-400'
            ]"
                    >
                        <div class="text-sm text-gray-500 mb-2">Custom Amount</div>
                        <div class="text-3xl font-bold mb-2">$15+</div>
                        <div class="text-sm text-gray-600">Set your own</div>
                    </button>

                </div>

                <!-- Custom Amount Input (shows when custom selected) -->
                <div v-if="selectedTier === 'custom'" class="mb-6 max-w-md mx-auto">
                    <!-- Amount input UI here -->
                </div>

                <button disabled class="w-full px-6 py-3 bg-gray-300 text-gray-500 font-semibold rounded-lg cursor-not-allowed">
                    Coming Soon
                </button>
            </div>
        </div>

    </div>
</template>

<script setup>
import Icon from '@/Components/System/Icon.vue'
import LogInForm from '@/Components/Auth/LogInForm.vue'
import { useAuth } from '@/Composables/useAuth'
import { Link } from "@inertiajs/vue3"
import {useTheme} from "@/Composables/useTheme.js";
import {computed, onMounted, ref} from "vue";

const auth = useAuth()

const props = defineProps({
    pageTheme: {
        type: String,
        required: true
    }
})

const { theme } = useTheme(props.pageTheme)

const selectedTier = ref(null);
const customAmount = ref(25);
const showFreeOption = computed(() => {
    const params = new URLSearchParams(window.location.search)
    return params.get('access') === 'free'
})
selectedTier
onMounted(() => {
    if (!showFreeOption.value) {
        selectedTier.value = 'standard'
    }
})
</script>
