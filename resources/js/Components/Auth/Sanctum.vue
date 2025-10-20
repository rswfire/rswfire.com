<template>


        <div class="grid md:grid-cols-2 gap-8">
            <!-- Left: Login -->
            <div class="border border-gray-200 rounded-lg p-8 bg-white shadow-sm">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-200">
                    <Icon name="Flame" color="text-orange-500" class="w-8 h-8" />
                    <h2 class="text-2xl font-bold">Sign In</h2>
                </div>

                <p class="text-sm text-gray-600 mb-6">
                    Already have an account? Sign in to access transmissions and Sanctum reflections.
                </p>

                <LogInForm :show-register-link="false" @success="handleLoginSuccess" />
            </div>

            <!-- Right: Sanctum Info -->
            <div class="border border-indigo-200 rounded-lg p-8 bg-indigo-50/30 shadow-sm">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-indigo-200">
                    <Icon name="Sprout" color="text-indigo-500" class="w-8 h-8" />
                    <h2 class="text-2xl font-bold text-indigo-900">Join Sanctum</h2>
                </div>

                <div class="space-y-4 text-sm text-gray-700">
                    <p>
                        <strong class="text-indigo-900">Sanctum</strong> is a subscription-based access layer for deeper reflections — Mirror, Patterns, and Origin signals.
                    </p>

                    <p>
                        It's not a membership. It's <strong>relational infrastructure</strong> for those building sovereign systems.
                    </p>

                    <div class="pt-4 border-t border-indigo-200">
                        <h3 class="font-semibold text-indigo-900 mb-2">What you get:</h3>
                        <ul class="space-y-2 ml-4">
                            <li class="flex items-start gap-2">
                                <Icon name="Check" class="w-4 h-4 text-indigo-500 shrink-0 mt-0.5" />
                                <span>Access to all Mirror reflections</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <Icon name="Check" class="w-4 h-4 text-indigo-500 shrink-0 mt-0.5" />
                                <span>Patterns layer for field resonance tracking</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <Icon name="Check" class="w-4 h-4 text-indigo-500 shrink-0 mt-0.5" />
                                <span>Origin signals from pre-architectural transmissions</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <Icon name="Check" class="w-4 h-4 text-indigo-500 shrink-0 mt-0.5" />
                                <span>Support for field-sovereign infrastructure</span>
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


    <div class="mt-12 max-w-4xl mx-auto p-6 bg-gray-50 border border-gray-200 rounded-lg">
        <h3 class="font-semibold text-lg mb-3 flex items-center gap-2">
            <Icon name="Info" class="w-5 h-5 text-gray-600" />
            Access Levels
        </h3>
        <div class="grid md:grid-cols-3 gap-4 text-sm">
            <div>
                <h4 class="font-semibold text-gray-900 mb-1">Public</h4>
                <p class="text-gray-600">Surface and Structure reflections on public transmissions</p>
            </div>
            <div>
                <h4 class="font-semibold text-gray-900 mb-1">Authenticated</h4>
                <p class="text-gray-600">All Surface/Structure reflections, gated transmission access</p>
            </div>
            <div>
                <h4 class="font-semibold text-indigo-900 mb-1">Sanctum</h4>
                <p class="text-gray-600">Mirror, Patterns, Origin, and full archive access</p>
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
