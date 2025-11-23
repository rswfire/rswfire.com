<template>
    <Content :theme="pageTheme">
        <Hero
            title="TRANSMISSIONS"
            meta="MAPPED THROUGH RECURSIVE AI REFLECTION"
            subtitle="A REAL-TIME ARCHIVE OF SOVEREIGN LIFE"
            :theme="pageTheme"
        />

        <section class="max-w-4xl mx-auto px-6 text-gray-900 pt-4">
            <div class="max-w-none columns-2 gap-8">
                <div>These are real-time transmissions &mdash;</div>
                <div class="ml-4">fragments of a sovereign life</div>
                <div class="ml-8">caught mid-becoming.</div>
                <div><em>Nothing here will wait for you to catch up</em>.</div>
                <div>There is no summary to soften the entry.</div>
                <div>There is no title that reveals what it means.</div>

                <div>800+ transmissions &mdash;</div>
                <div class="ml-4">recorded across years of radical self-honesty.</div>
                <div>This is not a catalog.</div>
                <div class="ml-4">It is evidence of <em>coherence under pressure</em>.</div>
                <div>You're not here to watch.</div>
                <div>You're here to feel it move through you.</div>
            </div>
        </section>

        <div v-if="loading" class="py-16 text-center text-gray-400">
            Loading Transmissions...
        </div>

        <div v-else-if="error" class="py-16 text-center text-red-600">
            {{ error }}
        </div>

        <template v-else-if="transmissions">
            <Pagination :links="transmissions.links" />

            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div
                    v-for="transmission in transmissions.data"
                    :key="transmission.signal_id"
                    @click="goTo(transmission.signal_ulid)"
                    class="group cursor-pointer rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200 border border-gray-200 hover:border-black"
                    :class="transmission.structure_visibility === 'sanctum' ? 'bg-indigo-50' : 'bg-white'"
                >
                    <div class="aspect-w-16 aspect-h-9 bg-gray-100">
                        <img
                            :src="transmission.signal_metadata.youtube.thumbnail"
                            :alt="transmission.signal_ulid"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200"
                        />
                    </div>

                    <div class="p-4 space-y-3">
                        <div class="flex items-center gap-2">
                            <h2 class="text-md font-semibold leading-tight text-gray-900 group-hover:text-black truncate flex-1">
                                {{ transmission.signal_title || transmission.signal_ulid }}
                            </h2>
                            <div v-if="transmission.structure_visibility === 'sanctum'" class="text-sm flex-shrink-0"><Icon name="Sprout" class="text-indigo-400 w-[32px] h-[32px]" /></div>
                        </div>

                        <p class="text-sm text-gray-600 line-clamp-3">
                            {{ transmission.signal_description || 'No Description Available' }}
                        </p>
                        <h3 class="text-xs font-semibold leading-tight text-gray-900 group-hover:text-black font-mono">
                            {{ transmission.signal_ulid }}
                        </h3>
                        <!--
                        <div v-if="transmission.symbolic_elements?.length" class="space-y-1">
                            <div class="text-[10px] uppercase font-semibold text-gray-400 tracking-wide">
                                Symbolic Elements
                            </div>
                            <div class="flex gap-1.5 overflow-x-auto scrollbar-hide">
                                <span
                                    v-for="element in transmission.symbolic_elements"
                                    :key="element"
                                    class="text-xs px-2 py-0.5 bg-purple-100 text-purple-700 rounded-full whitespace-nowrap flex-shrink-0"
                                >
                                  {{ element }}
                                </span>
                            </div>
                        </div>
                        -->

                        <!--
                        <div v-if="transmission.ontological_states?.length" class="space-y-1">
                            <div class="text-[10px] uppercase font-semibold text-gray-400 tracking-wide">
                                Ontological States
                            </div>
                            <div class="flex gap-1.5 overflow-x-auto scrollbar-hide">
                                <span
                                    v-for="state in transmission.ontological_states"
                                    :key="state"
                                    class="text-xs px-2 py-0.5 bg-indigo-100 text-indigo-700 rounded-full whitespace-nowrap flex-shrink-0"
                                >
                                  {{ state }}
                                </span>
                            </div>
                        </div>
                        -->

                        <!--
                        <div v-if="transmission.engaged_subsystems?.length" class="space-y-1">
                            <div class="text-[10px] uppercase font-semibold text-gray-400 tracking-wide">
                                Engaged Subsystems
                            </div>
                            <div class="flex gap-1.5 overflow-x-auto scrollbar-hide">
                                <span
                                    v-for="subsystem in transmission.engaged_subsystems"
                                    :key="subsystem"
                                    class="text-xs px-2 py-0.5 bg-green-100 text-green-700 rounded-full whitespace-nowrap flex-shrink-0"
                                >
                                  {{ subsystem }}
                                </span>
                            </div>
                        </div>
                        -->

                        <div class="text-xs text-gray-400 flex justify-between pt-2 border-t border-gray-100">
                            <span>{{ formatDate(transmission.stamp_created) }}</span>
                            <span>{{ formatDuration(transmission.signal_metadata.duration) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <Pagination :links="transmissions.links" />
        </template>
    </Content>
</template>

<script setup>
import { onMounted } from 'vue'
import { router } from '@inertiajs/vue3'
import Hero from '@/Components/System/Hero.vue'
import Content from '@/Components/System/Content.vue'
import Pagination from '@/Components/System/Pagination.vue'
import { useTransmissions } from '@/Composables/useTransmissions'
import Icon from "@/Components/System/Icon.vue";

const { transmissions, loading, error, loadIndex } = useTransmissions()

onMounted(() => {
    const urlParams = new URLSearchParams(window.location.search)
    const page = parseInt(urlParams.get('page') || '1')
    loadIndex(page, 24)
})

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

const pageTheme = 'transmissions'
</script>

<style>
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
</style>
