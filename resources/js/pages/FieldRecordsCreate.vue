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

            <button
                type="submit"
                class="mt-6 inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition"
            >
                Submit
            </button>
        </form>

        <p v-if="submitted" class="text-green-600 mt-4">Record submitted successfully.</p>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const form = ref({
    title: '',
    body: '',
})

const submitted = ref(false)

async function submit() {
    await axios.post('/api/content', {
        content_type: 'field-record',
        content_title: form.value.title,
        content_body: form.value.body,
        content_meta: {},
    })

    submitted.value = true
    form.value.title = ''
    form.value.body = ''
}
</script>
