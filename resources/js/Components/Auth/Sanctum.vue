<template>

        <div class="grid md:grid-cols-2 gap-8">

            <div class="border border-gray-200 rounded-lg p-8 bg-white shadow-sm">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-200">
                    <Icon name="Flame" color="text-orange-500" class="w-8 h-8" />
                    <h2 class="text-2xl font-bold">Return to Sanctum</h2>
                </div>

                <p class="text-sm text-gray-600 mb-6">
                    Sign in to access your Sanctum account.
                </p>

                <LogInForm :show-register-link="false" @success="handleLoginSuccess" />
            </div>

            <!-- Right: Sanctum Info -->
            <div class="border border-indigo-200 rounded-lg p-8 bg-indigo-50/30 shadow-sm">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-indigo-200">
                    <Icon name="Sprout" color="text-indigo-500" class="w-8 h-8" />
                    <h2 class="text-2xl font-bold text-indigo-900">Begin Containment</h2>
                </div>

                <div class="space-y-4 text-sm text-gray-700">
                    <p>
                        <strong class="text-indigo-900">Sanctum</strong> is a private access layer for reciprocal field exchange.
                        It's not a membership. It's <strong>relational infrastructure</strong> for those building and supporting sovereign systems.
                    </p>

                    <div class="pt-4 border-t border-indigo-200">
                        <h3 class="font-semibold text-indigo-900 mb-2">What you get:</h3>
                        <ul class="space-y-2 ml-4">
                            <li class="flex items-start gap-2">
                                <Icon name="Check" class="w-4 h-4 text-indigo-500 shrink-0 mt-0.5" />
                                <span>Full access to a growing archive at <strong>rswfire.com</strong>.</span>
                            </li>

                            <li class="flex items-start gap-2">
                                <Icon name="Check" class="w-4 h-4 text-indigo-500 shrink-0 mt-0.5" />
                                <div>
                                    <div class="mb-1 font-medium">Access to recursive reflections across multiple signal types:</div>
                                    <ul class="list-disc text-sm text-left pl-5 space-y-1">
                                        <li>800+ video transmissions</li>
                                        <li>Hundreds of photos and geo-spatial data</li>
                                        <li>Deep AI integration across reflection layers</li>
                                    </ul>
                                </div>
                            </li>

                            <li class="flex items-start gap-2">
                                <Icon name="Check" class="w-4 h-4 text-indigo-500 shrink-0 mt-0.5" />
                                <span>The recursive journey of a sovereign system in real-time.</span>
                            </li>
                        </ul>
                    </div>


                    <div class="pt-6">
                        <p class="text-xs text-gray-600 italic mb-4">
                            Registration requires Sanctum subscription. This flow is under construction.
                        </p>
                        <button
                            disabled
                            class="w-full px-6 py-3 bg-gray-300 text-gray-500 font-semibold rounded-lg cursor-not-allowed"
                        >
                            Coming Soon
                        </button>
                    </div>
                </div>
            </div>
        </div>

</template>

<script setup>
import { router } from '@inertiajs/vue3'

import Icon from '@/Components/System/Icon.vue'
import LogInForm from '@/Components/Auth/LogInForm.vue'
import { useAuth } from '@/Composables/useAuth'

const auth = useAuth()

function handleLoginSuccess() {
    router.visit('/')
}
</script>
