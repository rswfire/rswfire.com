<template>
    <div class="space-y-6">
        <div
            v-for="entry in entries"
            :key="entry.content_id"
            class="p-4 border rounded hover:shadow transition"
        >
            <router-link :to="`/content/${entry.content_id}`" class="block mb-2">
                <h2 class="text-xl font-bold">{{ entry.content_title || 'Untitled Entry' }}</h2>
            </router-link>
            <div class="prose prose-sm max-w-none" v-html="renderPreview(entry.content_body)"></div>
            <div v-if="entry.content_meta" class="text-xs text-gray-400 mt-2">
                <pre>{{ entry.content_meta }}</pre>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import MarkdownIt from 'markdown-it'

const entries = ref([])
const md = new MarkdownIt({ html: true, linkify: true, typographer: true })

onMounted(async () => {
    const response = await axios.get('/api/content?type=field-record')
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
