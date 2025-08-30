<template>
    <section id="fieldcraft-records">
        <div class="my-8 prose prose-neutral max-w-full mx-auto">
            <h2 v-if="title" class="text-2xl font-semibold text-center">{{ title || 'FIELDCRAFT RECORDS' }}</h2>

            <!-- Pagination Controls -->
            <div v-if="totalPages > 1" class="flex items-center justify-center space-x-2 mt-2">
                <button
                    @click="previousPage"
                    :disabled="currentPage === 1"
                    class="px-3 py-1 text-sm border border-gray-300 rounded-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    Previous
                </button>

                <div class="flex space-x-1">
                    <button
                        v-for="page in visiblePages"
                        :key="page"
                        @click="goToPage(page)"
                        :class="{
                            'bg-gray-900 text-white': page === currentPage,
                            'bg-white text-gray-700 hover:bg-gray-50': page !== currentPage
                        }"
                        class="px-3 py-1 text-sm border border-gray-300 rounded-md"
                    >
                        {{ page }}
                    </button>
                </div>

                <button
                    @click="nextPage"
                    :disabled="currentPage === totalPages"
                    class="px-3 py-1 text-sm border border-gray-300 rounded-md hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    Next
                </button>
            </div>

            <!-- Results info -->
            <div v-if="filteredEntries.length > 0" class="text-center text-sm text-gray-500 mt-2">
                Showing {{ ((currentPage - 1) * perPage) + 1 }} - {{ Math.min(currentPage * perPage, filteredEntries.length) }} of {{ filteredEntries.length }} Entries
            </div>

            <div v-else class="text-center text-gray-500 mt-8">
                No entries found{{ searchKeywords ? ` for "${searchKeywords.join(', ')}"` : '' }}
            </div>

            <div v-if="filteredEntries.length > 0" class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <Link
                    v-for="entry in currentPageEntries"
                    :key="entry.content_id"
                    :href="`/fieldcraft/${entry.content_id}`"
                    class="group block bg-white rounded-xl border border-gray-200 shadow-sm p-5 hover:bg-yellow-50 transition-all"
                >
                    <div class="space-y-3">
                        <h2 class="text-lg font-semibold text-gray-900 group-hover:underline">
                            {{ entry.content_title }}
                        </h2>

                        <p class="text-sm text-gray-700 leading-snug line-clamp-4">
                            {{ entry.content_body.slice(0, 240) }}...
                        </p>

                        <div class="flex flex-wrap gap-1 text-xs text-gray-500 pt-4 border-t">
                            <div class="flex flex-wrap gap-1">
                                <span
                                    v-for="tag in parsedTags(entry.content_meta)"
                                    :key="tag"
                                    class="px-2 py-0.5 bg-gray-100 rounded-full text-gray-600"
                                >
                                    {{ tag }}
                                </span>
                            </div>
                            <span class="ml-auto whitespace-nowrap">
                                {{ formatDate(entry.stamp_created) }}
                            </span>
                        </div>
                    </div>
                </Link>
            </div>

        </div>
    </section>
</template>

<script setup>
import { ref, computed, watch } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    fieldcraft: {
        type: Array,
        default: () => []
    },
    searchKeywords: {
        type: Array,
        default: () => ['honeyman'] // Default search terms
    },
    title: {
        type: String,
        default: null
    },
    perPage: {
        type: Number,
        default: 3
    }
})

const currentPage = ref(1)

// Filter entries based on search keywords
const filteredEntries = computed(() => {
    if (!props.searchKeywords || props.searchKeywords.length === 0) {
        return props.fieldcraft
    }

    return props.fieldcraft.filter(entry => {
        const searchableText = [
            entry.content_title,
            entry.content_body,
            JSON.stringify(entry.content_meta)
        ].join(' ').toLowerCase()

        return props.searchKeywords.some(keyword =>
            searchableText.includes(keyword.toLowerCase())
        )
    })
})

// Pagination computed properties
const totalPages = computed(() => Math.ceil(filteredEntries.value.length / props.perPage))

const currentPageEntries = computed(() => {
    const start = (currentPage.value - 1) * props.perPage
    const end = start + props.perPage
    return filteredEntries.value.slice(start, end)
})

const visiblePages = computed(() => {
    const pages = []
    const total = totalPages.value
    const current = currentPage.value

    if (total <= 7) {
        // Show all pages if total is 7 or less
        for (let i = 1; i <= total; i++) {
            pages.push(i)
        }
    } else {
        // Show smart pagination
        if (current <= 4) {
            // Show first 5 pages
            for (let i = 1; i <= 5; i++) {
                pages.push(i)
            }
            pages.push('...', total)
        } else if (current >= total - 3) {
            // Show last 5 pages
            pages.push(1, '...')
            for (let i = total - 4; i <= total; i++) {
                pages.push(i)
            }
        } else {
            // Show pages around current
            pages.push(1, '...', current - 1, current, current + 1, '...', total)
        }
    }

    return pages
})

// Pagination methods
const goToPage = (page) => {
    if (page !== '...' && page >= 1 && page <= totalPages.value) {
        currentPage.value = page
    }
}

const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++
    }
}

const previousPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--
    }
}

// Reset to page 1 when search keywords change
watch(() => props.searchKeywords, () => {
    currentPage.value = 1
})

// Utility functions
function formatDate(date) {
    return new Date(date).toLocaleDateString(undefined, {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    })
}

function parsedTags(meta) {
    try {
        const parsed = typeof meta === 'string' ? JSON.parse(meta) : meta
        return parsed?.tags || []
    } catch {
        return []
    }
}
</script>
