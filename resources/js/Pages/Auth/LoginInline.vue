<template>
    <form @submit.prevent="submit" class="space-y-6 max-w-md w-full mx-auto text-gray-800">
        <div>
            <label for="login-email" class="block text-sm font-medium text-gray-700">
                Email
            </label>
            <input
                id="login-email"
                name="email"
                type="email"
                v-model="form.email"
                class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-gray-500 focus:ring-0 sm:text-sm"
                autocomplete="email"
                autofocus
            />
            <InputError :message="form.errors.email" />
        </div>

        <div>
            <label for="login-password" class="block text-sm font-medium text-gray-700">
                Password
            </label>
            <input
                id="login-password"
                name="password"
                type="password"
                v-model="form.password"
                class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-gray-500 focus:ring-0 sm:text-sm"
                autocomplete="current-password"
            />
            <InputError :message="form.errors.password" />
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center text-sm text-gray-600">
                <input
                    type="checkbox"
                    v-model="form.remember"
                    class="h-4 w-4 rounded border-gray-300 text-gray-800 focus:ring-0"
                />
                <span class="ml-2">Remember me</span>
            </label>
        </div>

        <div>
            <button
                type="submit"
                class="w-full rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-black focus:outline-none focus:ring-0"
            >
                Enter
            </button>
        </div>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue'

const form = useForm({
    email: '',
    password: '',
    remember: false,
})

function submit() {
    form.post(route('login'), {
        preserveScroll: true,
        onSuccess: () => {
            router.reload({ preserveScroll: true })
        },
    })
}
</script>
