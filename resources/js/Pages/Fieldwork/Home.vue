<template>
    <div class="space-y-8">
        <h1 class="text-3xl font-semibold text-gray-900">Fieldwork</h1>
        <div class="space-y-6">
            <div
                v-for="entry in entries"
                :key="entry.content_id"
                class="p-4 border rounded hover:shadow transition"
            >
                <Link :href="`/fieldwork/${entry.content_id}`" class="block mb-2">
                    <h2 class="text-xl font-bold">{{ entry.content_title || 'Untitled Entry' }}</h2>
                </Link>
                <div class="prose prose-sm max-w-none" v-html="renderPreview(entry.content_body)"></div>
                <div v-if="entry.content_meta" class="text-xs text-gray-400 mt-2">
                    <pre>{{ entry.content_meta }}</pre>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useMeta } from "@/Components/useMeta.js"
import { ref, onMounted } from 'vue'
import axios from 'axios'
import MarkdownIt from 'markdown-it'
import { Link } from "@inertiajs/vue3"

useMeta({
    title: 'Fieldwork | rswfire.com',
    description: 'Robert Samuel White',
    keywords: 'rswfire',
    image: '',
    url: 'https://rswfire.com/',
    type: 'article',
})

const entries = ref([])
const md = new MarkdownIt({
    html: true,
    linkify: true,
    typographer: true,
    breaks: true
})


onMounted(async () => {
    const response = await axios.get('/api/content?type=fieldwork')
    entries.value = response.data
})

function renderPreview(mdText) {
    const preview = mdText.split('\n').slice(0, 4).join('\n')
    return md.render(preview)
}
</script>

<style scoped>
/* Custom styles if needed */
</style>
