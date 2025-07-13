<template>
    <Content>

        <Hero
            title="TRANSMISSION RECORDS"
            subtitle="A LIVING LOG OF EMBODIED EXPRESSION"
            meta="700+ TRANSMISSIONS DOCUMENTING THE SOVEREIGN PATH"
        />

        <section class="max-w-4xl mx-auto px-6 text-gray-900 pt-4">
            <div class="max-w-none columns-2 gap-8">

                <div>These are real-time transmissions &mdash;</div>
                <div class="ml-4">fragments of a sovereign life</div>
                <div class="ml-8">caught mid-becoming.</div>
                <div><em>Nothing here will wait for you to catch up</em>.</div>
                <div>There is no summary to soften the entry.</div>
                <div>There is no title that reveals what it means.</div>

                <div>700+ transmissions &mdash;</div>
                <div class="ml-4">recorded across years of radical self-honesty.</div>
                <div>This is not a catalog.</div>
                <div class="ml-4">It is evidence of <em>coherence under pressure</em>.</div>
                <div>You’re not here to watch.</div>
                <div>You’re here to feel it move through you.</div>

            </div>
        </section>

        <Pagination :links="transmissions.links" />

        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                v-for="transmission in transmissions.data"
                :key="transmission.signal_id"
                @click="goTo(transmission.signal_ulid)"
                class="group cursor-pointer rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-md transition-shadow duration-200 border border-gray-200 hover:border-black"
            >

                <div class="aspect-w-16 aspect-h-9 bg-gray-100">
                    <img
                        :src="transmission.signal_metadata.youtube.thumbnail"
                        :alt="transmission.signal_title"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200"
                    />
                </div>

                <div class="p-4 space-y-1">
                    <h2 class="text-md font-semibold leading-tight text-gray-900 group-hover:text-black line-clamp-2">
                        {{ transmission.signal_title }}
                    </h2>
                    <p class="text-sm text-gray-500 clamp-responsive">
                        {{ transmission.signal_description }}
                    </p>

                    <div v-if="getSurfaceTags(transmission).length" class="pt-2">
                        <div class="text-xs uppercase font-semibold text-gray-500 tracking-wide">
                            Surface Tags <span class="ml-2 text-gray-400 font-normal">LLAMA3:70B-surface</span>
                        </div>
                        <div class="flex flex-wrap gap-2 mt-1">
                            <span
                                v-for="tag in getSurfaceTags(transmission)"
                                :key="tag"
                                class="text-xs px-2 py-0.5 bg-gray-100 text-gray-700 rounded-full"
                            >
                              {{ tag }}
                            </span>
                        </div>
                    </div>

                    <div v-if="getOntologicalTags(transmission).length" class="pt-2">
                        <div class="text-xs uppercase font-semibold text-gray-500 tracking-wide">
                            Symbolic Elements <span class="ml-2 text-gray-400 font-normal">LLAMA3:70B-narrative</span>
                        </div>
                        <div class="flex flex-wrap gap-2 mt-1">
                            <span
                                v-for="tag in getOntologicalTags(transmission)"
                                :key="tag"
                                class="text-xs px-2 py-0.5 bg-gray-100 text-gray-700 rounded-full"
                            >
                              {{ tag }}
                            </span>
                        </div>
                    </div>

                    <div class="text-xs text-gray-400 flex justify-between pt-2">
                        <span>{{ formatDate(transmission.stamp_created) }}</span>
                        <span>{{ formatDuration(transmission.signal_metadata.duration) }}</span>
                    </div>
                </div>

            </div>

        </div>

        <Pagination :links="transmissions.links" />

    </Content>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import {computed, ref} from 'vue'
import Hero from "@/Components/System/Hero.vue";
import Content from "@/Components/System/Content.vue";
import Pagination from '@/Components/System/Pagination.vue'

defineProps({
    transmissions: Object
})

const getOntologicalTags = (transmission) => {
    try {
        const content = JSON.parse(transmission.reflection_narrative?.reflection_content || "{}")
        return content.symbolic_elements || []
    } catch (e) {
        return []
    }
}

const getSurfaceTags = (transmission) => {
    try {
        const content = JSON.parse(transmission.reflection_surface?.reflection_content || "{}")
        return content.tags || []
    } catch (e) {
        return []
    }
}

const expanded = ref(false)
const goTo = (id) => {
    router.visit(`/transmission/${id}`)
}

const formatDate = (dateStr) => {
    const date = new Date(dateStr)
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
    })
}

const formatDuration = (seconds) => {
    if (!seconds) return '—'
    const m = Math.floor(seconds / 60)
    const s = seconds % 60
    return `${m}m ${s}s`
}
</script>

<style>
.clamp-responsive {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

@media (max-width: 640px) {
    .clamp-responsive {
        -webkit-line-clamp: 5;
    }
}

@media (min-width: 641px) {
    .clamp-responsive {
        -webkit-line-clamp: 7;
    }
}
</style>
