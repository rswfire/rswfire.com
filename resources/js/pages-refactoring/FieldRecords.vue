<template>
    <div class="space-y-8">
        <h1 class="text-3xl font-semibold text-gray-900">Field Records</h1>
        <ContentFeed />
    </div>
</template>

<script setup>
import ContentFeed from "../Components/ContentFeed.vue"
import { useMeta } from '../Components/useMeta.ts'

useMeta({
    title: 'Field Records | rswfire.com',
    description: 'Robert Samuel White',
    keywords: 'rswfire',
    image: '',
    url: 'https://rswfire.com/',
    type: 'article',
})
</script>
