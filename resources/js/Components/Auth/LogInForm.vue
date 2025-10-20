<template>
    <div class="w-full max-w-md mx-auto">
        <!-- Error message -->
        <div v-if="error" class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
            <div class="flex items-start gap-3">
                <Icon name="AlertCircle" class="w-5 h-5 text-red-500 shrink-0 mt-0.5" />
                <div class="text-sm text-red-700">{{ error }}</div>
            </div>
        </div>

        <form @submit.prevent="handleLogin" class="space-y-5">
            <!-- Email -->
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">
                    Email
                </label>
                <input
                    id="email"
                    v-model="form.email"
                    type="email"
                    required
                    placeholder="your@email.com"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition disabled:bg-gray-50 disabled:text-gray-400"
                    :disabled="loading"
                />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-gray-600 mb-2">
                    Password
                </label>
                <input
                    id="password"
                    v-model="form.password"
                    type="password"
                    required
                    placeholder="••••••••"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition disabled:bg-gray-50 disabled:text-gray-400"
                    :disabled="loading"
                />
            </div>

            <!-- Submit button -->
            <button
                type="submit"
                :disabled="loading"
                class="w-full px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-lg hover:from-orange-600 hover:to-orange-700 disabled:opacity-50 disabled:cursor-not-allowed transition-all shadow-sm hover:shadow-md"
            >
                <span v-if="loading" class="flex items-center justify-center gap-2">
                    <Icon name="Loader2" class="w-4 h-4 animate-spin" />
                    Signing in...
                </span>
                <span v-else>Sign In</span>
            </button>
        </form>

        <!-- Register link (optional) -->
        <div v-if="showRegisterLink" class="mt-6 pt-6 border-t border-gray-200 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account?
                <button
                    @click="handleSwitchToRegister"
                    class="text-orange-600 hover:text-orange-700 font-semibold hover:underline transition ml-1"
                >
                    Create one
                </button>
            </p>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import Icon from '@/Components/System/Icon.vue'
import { useAuth } from '@/Composables/useAuth'

const props = defineProps({
    showRegisterLink: { type: Boolean, default: true },
    redirectAfterLogin: { type: String, default: '/' }
})

const auth = useAuth()
const loading = ref(false)
const error = ref(null)

const form = reactive({
    email: '',
    password: ''
})

async function handleLogin() {
    loading.value = true
    error.value = null

    try {
        await auth.login(form.email, form.password)
        window.location.reload() // Full reload of current page
    } catch (e) {
        error.value = e.message || 'Login failed. Please check your credentials.'
    } finally {
        loading.value = false
    }
}

function handleSwitchToRegister() {
    router.visit('/sanctum')
}
</script>
