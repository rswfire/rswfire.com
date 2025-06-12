<template>
    <form @submit.prevent="submit" class="space-y-6 max-w-md w-full mx-auto">
        <div>
            <label for="login-email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="login-email" name="email" v-model="form.email" type="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" autofocus />
            <InputError :message="form.errors.email" />
        </div>

        <div>
            <label for="login-password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="login-password" name="password" v-model="form.password" type="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" />
            <InputError :message="form.errors.password" />
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center">
                <input type="checkbox" v-model="form.remember" class="rounded" />
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div>
            <button type="submit" class="w-full px-4 py-2 bg-gray-900 text-white rounded hover:bg-black">
                Log in
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
