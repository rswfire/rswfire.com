<template>
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">View Entry</h1>
        <div v-if="entry" class="prose max-w-none" v-html="renderMarkdown(entry.content_body)"></div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import axios from 'axios'
import MarkdownIt from 'markdown-it'

const route = useRoute()
const entry = ref(null)
const md = new MarkdownIt()

onMounted(async () => {
    const response = await axios.get(`/api/content/${route.params.id}`)
    entry.value = response.data
})

function renderMarkdown(mdText) {
    return md.render(mdText)
}
</script>
