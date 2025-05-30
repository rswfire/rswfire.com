<template>
    <div class="max-w-2xl mx-auto space-y-6">
        <h1 class="text-2xl font-semibold text-gray-900">New Field Record</h1>

        <form @submit.prevent="submit">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                />
            </div>

            <div>
                <label for="body" class="block text-sm font-medium text-gray-700 mt-4">Body</label>
                <textarea
                    id="body"
                    v-model="form.body"
                    rows="8"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                ></textarea>
            </div>

            <div>
                <label for="meta" class="block text-sm font-medium text-gray-700 mt-4">Meta (JSON or keywords)</label>
                <input
                    id="meta"
                    v-model="form.meta"
                    type="text"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder='e.g. {"tags":["sovereignty","field-record"]}'
                />
            </div>

            <div>
                <label for="access_code" class="block text-sm font-medium text-gray-700 mt-4">Access Code</label>
                <input
                    id="access_code"
                    v-model="form.access_code"
                    type="password"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Enter access code"
                />
            </div>

            <button
                type="submit"
                class="mt-6 inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition"
            >
                Submit
            </button>
        </form>

        <p v-if="submitted" class="text-green-600 mt-4">Record submitted successfully.</p>
        <p v-if="error" class="text-red-600 mt-2">{{ error }}</p>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const form = ref({
    title: '',
    body: '',
    meta: '',
    access_code: ''
})

const submitted = ref(false)
const error = ref('')

async function submit() {
    submitted.value = false
    error.value = ''

    try {
        await axios.post('/api/content', {
            content_type: 'field-record',
            content_title: form.value.title,
            content_body: form.value.body,
            content_meta: safeParse(form.value.meta),
            access_code: form.value.access_code
        })

        submitted.value = true
        form.value.title = ''
        form.value.body = ''
        form.value.meta = ''
        form.value.access_code = ''
    } catch (err) {
        if (err.response?.status === 403) {
            error.value = 'Access denied: invalid access code.'
        } else {
            error.value = 'Submission failed. Please check your input and try again.'
        }
    }
}

function safeParse(input) {
    try {
        return JSON.parse(input || "{}")
    } catch {
        return { raw: input }
    }
}
</script>
