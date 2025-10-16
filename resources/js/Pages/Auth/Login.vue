<script setup>
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import LogInForm from '@/Components/Auth/LogInForm.vue';

defineProps({
    status: {
        type: String,
    },
});

function handleLoginSuccess() {
    // Redirect to home after successful login
    router.visit('/');
}
</script>

<template>

        <Head title="Log in" />

        <div class="min-h-screen flex items-center justify-center px-4">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">Sign In</h1>
                    <p class="mt-2 text-sm text-gray-600">
                        Access your account to continue
                    </p>
                </div>

                <div v-if="status" class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg text-sm text-green-600">
                    {{ status }}
                </div>

                <LogInForm
                    :showRegisterLink="true"
                    @success="handleLoginSuccess"
                    @switch-to-register="router.visit('/register')"
                />
            </div>
        </div>

</template>
