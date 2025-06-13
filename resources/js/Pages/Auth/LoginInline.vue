<template>
    <div class="flex flex-col items-center justify-center bg-gray-50 px-4 py-12 bg-white">
        <!-- Signal Glyph -->
        <div class="text-5xl mb-6">🔥</div>

        <!-- Card -->
        <form
            @submit.prevent="submit"
            class="w-full max-w-sm rounded-lg shadow-md p-6 space-y-6"
        >
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    v-model="form.email"
                    required
                    autocomplete="email"
                    autofocus
                    class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-gray-500 focus:ring-0 sm:text-sm"
                />
                <InputError :message="form.errors.email" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-gray-500 focus:ring-0 sm:text-sm"
                />
                <InputError :message="form.errors.password" />
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center">
                    <input
                        type="checkbox"
                        v-model="form.remember"
                        class="h-4 w-4 rounded border-gray-300 text-gray-800 focus:ring-0"
                    />
                    <span class="ml-2 text-gray-600">Remember me</span>
                </label>

                <a href="/forgot-password" class="text-gray-600 hover:underline">
                    Forgot your password?
                </a>
            </div>

            <div>
                <button
                    type="submit"
                    class="w-full rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-black focus:outline-none focus:ring-0"
                >
                    Log in
                </button>
            </div>
        </form>
    </div>
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
