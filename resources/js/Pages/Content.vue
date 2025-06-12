<template>
    <div class="space-y-4">
        <h1 class="text-2xl font-bold">{{ entry.content_title }}</h1>

        <p class="text-sm text-gray-500">
            Created: {{ formatDate(entry.stamp_created) }}
        </p>

        <div class="prose max-w-none" v-html="renderedBody"></div>

        <div v-if="entry.content_meta && Object.keys(entry.content_meta).length" class="mt-4 text-sm text-gray-600">
            <strong class="text-gray-800">Meta:</strong>
            <span>{{ entry.content_meta }}</span>
        </div>

        <Link
            href="/fieldwork"
            class="inline-block text-sm mt-6 text-indigo-500 hover:underline"
        >
            ← Back to Records
        </Link>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue"
import { useRoute } from "vue-router"
import axios from "axios"
import MarkdownIt from "markdown-it"
import { Link } from "@inertiajs/vue3"

const route = useRoute()
const entry = ref({})
const renderedBody = ref("")
const md = new MarkdownIt({
    html: true,
    linkify: true,
    typographer: true,
    breaks: true
})

onMounted(async () => {
    const { data } = await axios.get(`/api/content/${route.params.id}`)
    entry.value = data
    renderedBody.value = md.render(data.content_body)
})

function formatDate(dateStr) {
    return new Date(dateStr).toLocaleString()
}
</script>
