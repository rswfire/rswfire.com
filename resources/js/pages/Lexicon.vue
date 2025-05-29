<template>
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Lexicon</h1>

        <div v-if="lexicon && Object.keys(lexicon).length" class="space-y-6">
            <div
                v-for="(entry, term) in lexicon"
                :key="term"
                class="border border-gray-200 rounded-xl p-4 shadow-sm"
            >
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    {{ entry.label }}
                </h2>
                <p class="mt-2 text-gray-700 text-sm">{{ entry.short }}</p>
                <p class="mt-1 text-gray-600 text-sm">{{ entry.long }}</p>
            </div>
        </div>

        <div v-else class="text-gray-500">Loading lexicon...</div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useMeta } from '../components/useMeta.ts'

useMeta({
    title: 'Lexicon | rswfire.com',
    description: 'Robert Samuel White',
    keywords: 'rswfire',
    image: '',
    url: 'https://rswfire.com/',
    type: 'article',
})

const lexicon = ref(null)

onMounted(async () => {
    try {
        const res = await fetch('/lexicon.json')
        console.log('Fetch status:', res.status)
        const data = await res.json()
        console.log('Lexicon loaded:', data)
        lexicon.value = data
    } catch (err) {
        console.error('Error loading lexicon:', err)
    }
})
</script>

<style scoped>
</style>
