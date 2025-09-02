<template>

    <Content :theme="pageTheme">

        <Hero
            title="FIELDCRAFT BLOG"
            subtitle="A DIGITAL ARCHIVE OF LIVED COHERENCE, COLLAPSE TRACKING, AND SIGNAL ORIENTATION"
            :meta="`PAGE ${entries.current_page} OF ${entries.last_page}`"
            :theme="pageTheme"
        />

        <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

            <section id="fieldwork">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <Link
                        v-for="entry in entries.data"
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

                <!-- Pagination -->
                <div class="pt-10 flex justify-center">
                    <Pagination :links="entries.links" />
                </div>
            </section>

        </div>

    </Content>

</template>


<script setup>
import { Link } from '@inertiajs/vue3'
import Pagination from '@/Components/System/Pagination.vue'
import Hero from "@/Components/System/Hero.vue";
import Content from "@/Components/System/Content.vue";

defineProps({
    entries: Object
})

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

const pageTheme = "fieldcraft";

</script>
