<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="max-w-md w-full p-8 bg-white shadow-lg rounded-lg">

            <!-- Loading State -->
            <div v-if="status === 'loading'" class="text-center">
                <Icon name="Loader2" class="w-12 h-12 mx-auto mb-4 animate-spin text-green-600" />
                <h2 class="text-xl font-bold mb-2">Activating Your Sanctum Access</h2>
                <p class="text-gray-600">Please wait while we confirm your subscription...</p>
            </div>

            <!-- Success State -->
            <div v-else-if="status === 'success'" class="text-center">
                <Icon name="CheckCircle" class="w-16 h-16 mx-auto mb-4 text-green-600" />
                <h2 class="text-2xl font-bold mb-2 text-green-600">Welcome to Sanctum</h2>
                <p class="text-gray-600 mb-6">Your subscription has been activated.</p>
                <p class="text-sm text-gray-500 mb-4">Redirecting you back...</p>
            </div>

            <!-- Error State -->
            <div v-else-if="status === 'error'" class="text-center">
                <Icon name="XCircle" class="w-16 h-16 mx-auto mb-4 text-red-600" />
                <h2 class="text-2xl font-bold mb-2 text-red-600">Activation Failed</h2>
                <p class="text-gray-600 mb-6">{{ errorMessage }}</p>
                <Link
                    href="/sanctum"
                    class="inline-block px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700"
                >
                    Return to Sanctum Page
                </Link>
            </div>

        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import Icon from '@/Components/System/Icon.vue'

const props = defineProps({
    session_id: {
        type: String,
        required: true
    },
    api_url: {
        type: String,
        required: true
    }
})

const status = ref('loading')
const errorMessage = ref('')

async function activateSubscription() {
    try {
        const response = await fetch(`${props.api_url}/api/subscription/activate`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                session_id: props.session_id
            })
        })

        const data = await response.json()

        if (data.success) {
            // Store new auth token
            localStorage.setItem('auth_token', data.token)

            status.value = 'success'

            // Redirect after 2 seconds
            setTimeout(() => {
                const returnUrl = sessionStorage.getItem('subscription_return_url') || '/'
                sessionStorage.removeItem('subscription_return_url')
                window.location.href = returnUrl
            }, 2000)
        } else {
            status.value = 'error'
            errorMessage.value = data.message || 'Something went wrong'
        }
    } catch (error) {
        console.error('Activation error:', error)
        status.value = 'error'
        errorMessage.value = 'Network error. Please contact support.'
    }
}

onMounted(() => {
    if (!props.session_id) {
        status.value = 'error'
        errorMessage.value = 'Invalid session'
        return
    }

    activateSubscription()
})
</script>
