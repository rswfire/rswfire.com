<template>
    <div v-if="authUser" class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8 space-y-8 text-gray-900">

    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8 space-y-8 text-gray-900">
        <!-- Conversation Title and Metadata -->
        <header class="space-y-1">
            <h1 class="text-3xl font-bold">{{ conversation.conversation_title || 'Untitled Conversation' }}</h1>
            <p class="text-sm text-gray-500">
                Started: {{ formatDate(conversation.stamp_started) }} ·
                Ended: {{ formatDate(conversation.stamp_ended) }}
            </p>
        </header>

        <!-- Message List -->
        <div class="space-y-6">
            <div
                v-for="msg in messages"
                :key="msg.message_id"
                :class="[
          'rounded-md p-4 shadow-sm border-l-4 transition-all duration-150',
          msg.message_author === 'user'
            ? 'bg-white border-rose-500'
            : 'bg-gray-50 border-sky-500',
        ]"
            >
                <div class="flex justify-between items-center text-xs text-gray-500 mb-2">
          <span class="uppercase font-semibold tracking-wide">
            {{ msg.message_author === 'user' ? 'You' : 'AI' }}
          </span>
                    <span>{{ formatDate(msg.stamp_created) }}</span>
                </div>

                <div class="prose prose-sm max-w-none text-gray-800" v-html="renderMarkdown(msg.message_content)" />
            </div>
        </div>
    </div>
        <!-- rest of the page here -->
    </div>
    <div v-else class="max-w-xl mx-auto py-20 text-center text-gray-500">
        <h2 class="text-xl font-semibold mb-4">Restricted</h2>
        <p class="mb-6">You must be signed in to view this conversation.</p>
        <LoginInline />
    </div>
</template>

<script setup>
import LoginInline from '@/Pages/Auth/LoginInline.vue'
import MarkdownIt from 'markdown-it'

const props = defineProps({
    conversation: Object,
    messages: Array,
    authUser: Object,
})

const md = new MarkdownIt({
    html: true,
    linkify: true,
    typographer: true,
    breaks: true,
})

function renderMarkdown(content) {
    return md.render(content || '')
}

function formatDate(isoString) {
    if (!isoString) return '—'
    const date = new Date(isoString)
    return date.toLocaleString(undefined, {
        dateStyle: 'medium',
        timeStyle: 'short',
    })
}
</script>

<style scoped>
/* You may extend this as needed */
</style>
