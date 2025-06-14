<template>

    <div class="max-w-3xl mx-auto py-12 space-y-6">
        <h1 class="text-3xl font-bold text-gray-900">{{ entry.content_title || 'Untitled Entry' }}</h1>
        <div class="prose max-w-none" v-html="renderMarkdown(entry.content_body)"></div>

        <div v-if="entry.content_meta" class="text-xs text-gray-400 mt-4">
            <pre>{{ entry.content_meta }}</pre>
        </div>
    </div>
</template>

<script setup>
import { onMounted } from 'vue'
import MarkdownIt from 'markdown-it'

const props = defineProps({
    entry: Object
})

const md = new MarkdownIt({
    html: true,
    linkify: true,
    typographer: true,
    breaks: true
})

function renderMarkdown(text) {
    return md.render(text || '')
}

</script>
