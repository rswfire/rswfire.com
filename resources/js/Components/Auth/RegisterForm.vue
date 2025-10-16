<template>
    <div class="w-full max-w-md">
        <div v-if="error" class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-600">
            {{ error }}
        </div>

        <form @submit.prevent="handleRegister" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Name
                </label>
                <input
                    id="name"
                    v-model="form.name"
                    type="text"
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                    :disabled="loading"
                />
            </div>

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
                    minlength="8"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                    :disabled="loading"
                />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    Confirm Password
                </label>
                <input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
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
                {{ loading ? 'Creating account...' : 'Register' }}
            </button>
        </form>

        <div v-if="showLoginLink" class="mt-4 text-center text-sm text-gray-600">
            Already have an account?
            <button @click="$emit('switch-to-login')" class="text-orange-600 hover:underline font-medium">
                Sign in
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { useAuth } from '@/Composables/useAuth'

defineProps({
    showLoginLink: {
        type: Boolean,
        default: true
    }
})

const emit = defineEmits(['success', 'switch-to-login'])

const auth = useAuth()
const loading = ref(false)
const error = ref(null)

const form = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
})

async function handleRegister() {
    if (form.password !== form.password_confirmation) {
        error.value = 'Passwords do not match'
        return
    }

    loading.value = true
    error.value = null

    try {
        await auth.register(form.name, form.email, form.password, form.password_confirmation)
        emit('success')
    } catch (e) {
        error.value = e.message || 'Registration failed. Please try again.'
    } finally {
        loading.value = false
    }
}
</script>
