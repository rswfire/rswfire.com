<template>
    <div class="w-full max-w-md">
        <div v-if="error" class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-600">
            {{ error }}
        </div>

        <form @submit.prevent="handleLogin" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    id="email"
                    v-model="form.email"
                    type="email"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                    :disabled="loading"
                />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input
                    id="password"
                    v-model="form.password"
                    type="password"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                    :disabled="loading"
                />
            </div>

            <button
                type="submit"
                :disabled="loading"
                class="w-full px-4 py-2 bg-orange-600 text-white font-medium rounded-lg hover:bg-orange-700 disabled:opacity-50 disabled:cursor-not-allowed transition"
            >
                {{ loading ? 'Signing in...' : 'Sign In' }}
            </button>
        </form>

        <div v-if="showRegisterLink" class="mt-4 text-center text-sm text-gray-600">
            Don't have an account?
            <button @click="$emit('switch-to-register')" class="text-orange-600 hover:underline font-medium">
                Register
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { useAuth } from '@/Composables/useAuth'

defineProps({
    showRegisterLink: {
        type: Boolean,
        default: true
    }
})

const emit = defineEmits(['success', 'switch-to-register'])

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
        emit('success')
    } catch (e) {
        error.value = e.message || 'Login failed. Please check your credentials.'
    } finally {
        loading.value = false
    }
}
</script>
