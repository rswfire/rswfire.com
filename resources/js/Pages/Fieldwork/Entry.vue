<template>
    <Content>

        <Hero
            :title="entry.content_title"
            subtitle="Fieldwork Record • Lived Signal"
            :meta="formatDate(entry.stamp_created)"
        />

        <section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-black py-10">

            <article
                class="prose prose-lg prose-neutral max-w-none"
                v-html="entry.content_body"
            />

            <div class="mt-12 border-t pt-6 flex justify-between text-sm text-gray-600">
                <div v-if="previous">
                    ← <Link :href="`/fieldwork/${previous.id}`" class="hover:underline">
                    {{ previous.title }}
                </Link>
                </div>
                <div v-if="next" class="ml-auto">
                    <Link :href="`/fieldwork/${next.id}`" class="hover:underline">
                        {{ next.title }}
                    </Link> →
                </div>
            </div>

            <!-- Tag Section -->
            <div
                v-if="tags.length"
                class="mt-10 flex flex-wrap gap-2 text-sm text-gray-600"
            >
        <span
            v-for="tag in tags"
            :key="tag"
            class="px-3 py-1 bg-gray-100 rounded-full"
        >
          #{{ tag }}
        </span>
            </div>

        </section>

    </Content>
</template>

<script setup>
import Content from '@/Components/System/Content.vue'
import Hero from '@/Components/System/Hero.vue'
import { Link } from "@inertiajs/vue3"

const props = defineProps({
    entry: Object,
    next: Object,
    previous: Object
})

const tags = (() => {
    try {
        const parsed = typeof props.entry.content_meta === 'string'
            ? JSON.parse(props.entry.content_meta)
            : props.entry.content_meta
        return parsed?.tags || []
    } catch {
        return []
    }
})()

function formatDate(date) {
    return new Date(date).toLocaleDateString(undefined, {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    })
}
</script>
