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
import { useMeta } from '@/Components/useMeta.js'

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

useMeta({
    title: `${props.entry.content_title || 'Fieldwork Entry'} | rswfire.com`,
    description: 'An entry from the sovereign archive',
    url: `https://rswfire.com/fieldwork/${props.entry.content_id}`,
    type: 'article',
})
</script>
