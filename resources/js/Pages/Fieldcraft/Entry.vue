<template>
    <Content>
        <Hero
            :title="entry.content_title"
            subtitle="Fieldwork Record • Lived Signal"
            :meta="formatDate(entry.stamp_created)"
        />

        <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <!-- Main Content with enhanced styling -->
            <div class="fieldcraft-content">
                <article
                    class="prose prose-xl prose-neutral max-w-none prose-headings:font-medium prose-headings:tracking-tight prose-p:leading-relaxed prose-p:text-gray-800"
                    v-html="entry.content_body"
                />
            </div>

            <!-- Navigation -->
            <div class="mt-16 border-t border-gray-200 pt-8 flex justify-between text-sm text-gray-600">
                <div v-if="previous">
                    ← <Link :href="`/fieldcraft/${previous.id}`" class="hover:text-gray-900 hover:underline transition-colors">
                    {{ previous.title }}
                </Link>
                </div>
                <div v-if="next" class="ml-auto">
                    <Link :href="`/fieldcraft/${next.id}`" class="hover:text-gray-900 hover:underline transition-colors">
                        {{ next.title }}
                    </Link> →
                </div>
            </div>

            <!-- Tag Section -->
            <div
                v-if="tags.length"
                class="mt-12 flex flex-wrap gap-2 text-sm"
            >
                <span
                    v-for="tag in tags"
                    :key="tag"
                    class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition-colors"
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

<style scoped>
.fieldcraft-content {
    @apply text-gray-900;
}

/* Enhanced paragraph spacing and typography */
.fieldcraft-content :deep(p) {
    @apply mb-6 leading-relaxed text-lg;
    font-feature-settings: "kern" 1, "liga" 1;
}

/* Better quote styling if you use blockquotes */
.fieldcraft-content :deep(blockquote) {
    @apply border-l-4 border-gray-300 pl-6 italic text-gray-700 my-8;
}

.fieldcraft-content :deep(ul) {
    @apply mb-6 space-y-2;
    list-style: disc !important;
    list-style-position: outside !important;
    padding-left: 1.5rem !important;
}

.fieldcraft-content :deep(ol) {
    @apply mb-6 space-y-2;
    list-style: decimal !important;
    list-style-position: outside !important;
    padding-left: 1.5rem !important;
}

.fieldcraft-content :deep(li) {
    @apply leading-relaxed;
    display: list-item !important;
    margin-left: 1rem !important;
}

/* Better emphasis styling */
.fieldcraft-content :deep(strong) {
    @apply font-semibold text-gray-900;
}

.fieldcraft-content :deep(em) {
    @apply italic text-gray-800;
}

/* Subheading styles if you use them */
.fieldcraft-content :deep(h2) {
    @apply text-2xl font-medium text-gray-900 mt-12 mb-6 tracking-tight;
}

.fieldcraft-content :deep(h3) {
    @apply text-xl font-medium text-gray-900 mt-10 mb-4 tracking-tight;
}

/* Enhanced link styling within content */
.fieldcraft-content :deep(a) {
    @apply text-blue-700 hover:text-blue-800 underline decoration-blue-200 hover:decoration-blue-300 transition-colors;
}

/* Better spacing for the first paragraph */
.fieldcraft-content :deep(p:first-child) {
    @apply text-xl leading-relaxed text-gray-800;
}
</style>
