<template>
    <div class="space-y-8">
        <h1 class="text-3xl font-semibold text-gray-900">Field Records</h1>
        <ContentFeed />
    </div>
</template>

<script setup>
import ContentFeed from "../components/ContentFeed.vue"
import { useMeta } from '../components/useMeta.ts'

useMeta({
    title: 'Field Records | rswfire.com',
    description: 'Robert Samuel White',
    keywords: 'rswfire',
    image: '',
    url: 'https://rswfire.com/',
    type: 'article',
})
</script>
