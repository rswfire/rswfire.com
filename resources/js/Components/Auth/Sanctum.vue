<template>
    <!-- Single outer container with unified border -->
    <div :class="['border rounded-lg shadow-sm overflow-hidden', theme.border, theme.bg]">

        <!-- Top: Two-column grid -->
        <div class="grid md:grid-cols-3 divide-x divide-gray-200">



            <!-- Right: What Sanctum Holds -->
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

            <!-- Left: Login -->
            <div class="p-6 md:col-span-1" :class="theme.bg">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b" :class="theme.border">
                    <Icon name="Flame" class="w-8 h-8" :class="theme.color" />
                    <h2 class="text-2xl font-bold text-black">Return to Sanctum</h2>
                </div>

                <p class="text-sm text-gray-600 mb-6">
                    Sign in to access your <strong :class="theme.color">Sanctum</strong> account.
                </p>

                <LogInForm :show-register-link="false" @success="handleLoginSuccess" />
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

            <div class="pt-6 mt-4 max-w-md mx-auto">
                <button disabled class="w-full px-6 py-3 bg-gray-300 text-gray-500 font-semibold rounded-lg cursor-not-allowed">
                    Coming Soon
                </button>
            </div>
        </div>

    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import Icon from '@/Components/System/Icon.vue'
import LogInForm from '@/Components/Auth/LogInForm.vue'
import { useAuth } from '@/Composables/useAuth'
import { Link } from "@inertiajs/vue3"
import {useTheme} from "@/Composables/useTheme.js";

const auth = useAuth()

const props = defineProps({
    pageTheme: {
        type: String,
        required: true
    }
})

const { theme } = useTheme(props.pageTheme)

function handleLoginSuccess() {
    router.visit('/')
}
</script>
