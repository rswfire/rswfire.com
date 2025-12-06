<template>
    <Content :theme="pageTheme">
        <Hero
            title="SYNTHESIS"
            meta="PATTERN RECOGNITION ACROSS THE ARCHIVE"
            subtitle="WHERE RECURSION REVEALS STRUCTURE"
            :theme="pageTheme"
        />

        <div class="mt-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-black">

            <section class="max-w-6xl mx-auto px-6 text-gray-900">
                <div class="max-w-none columns-2 gap-8">
                    <div>I don't think linearly &mdash;</div>
                    <div>I never have.</div>
                    <div class="ml-4">A pattern mentioned once,</div>
                    <div class="ml-8">becomes permanent orientation.</div>
                    <div>This is where you see how non-linear coherence works.</div>
                    <div>AI tracks what humans cannot.</div>
                    <div><em>Recursion reveals structure</em>.</div>

                    <div>Clustered reflections across multiple transmissions &mdash;</div>
                    <div class="ml-4">pattern recognition over weeks, months, years.</div>
                    <div>Thematic threads that connect non-sequential signals.</div>
                    <div>You're not reading summaries.</div>
                    <div>You're watching architecture emerge &mdash;</div>
                    <div class="ml-4">from lived experience &mdash;</div>
                    <div class="ml-8">in real time.</div>
                </div>
            </section>

            <div v-if="loading" class="py-16 text-center text-gray-400">
                Loading Synthesis...
            </div>

            <div v-else-if="error" class="py-16 text-center text-red-600">
                {{ error }}
            </div>

            <template v-else-if="clusters">
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto px-6">
                    <div
                        v-for="cluster in clusters"
                        :key="cluster.cluster_ulid"
                        @click="goTo(cluster.cluster_ulid)"
                        class="group cursor-pointer rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200 border border-gray-200 hover:border-black"
                        :class="cluster.cluster_state === 'active' ? 'bg-emerald-50' : 'bg-white'"
                    >
                        <div class="p-6 space-y-4">
                            <!-- Header -->
                            <div class="flex items-start justify-between gap-3">
                                <h2 class="text-lg font-semibold leading-tight text-gray-900 group-hover:text-black flex-1">
                                    {{ cluster.cluster_title }}
                                </h2>
                                <div
                                    v-if="cluster.cluster_state === 'active'"
                                    class="flex-shrink-0"
                                >
                                    <Icon name="Zap" class="text-emerald-500 w-[24px] h-[24px]" />
                                </div>
                            </div>

                            <!-- Arc Summary (first 2 lines) -->
                            <p
                                v-if="cluster.cluster_metadata?.reflection?.arc_summary"
                                class="text-sm text-gray-600 line-clamp-2 leading-relaxed"
                            >
                                {{ stripMarkdown(cluster.cluster_metadata.reflection.arc_summary) }}
                            </p>

                            <!-- Timespan -->
                            <div class="text-sm text-gray-500">
                                <span class="font-mono">{{ formatDate(cluster.stamp_cluster_start) }}</span>
                                <span class="mx-2">→</span>
                                <span class="font-mono">
                                    {{ cluster.stamp_cluster_end ? formatDate(cluster.stamp_cluster_end) : 'present' }}
                                </span>
                            </div>

                            <!-- Transformation Pattern (if available) -->
                            <div
                                v-if="cluster.cluster_metadata?.reflection?.transformation_pattern"
                                class="text-xs text-purple-700 font-mono bg-purple-50 px-3 py-2 rounded border border-purple-100"
                            >
                                {{ cluster.cluster_metadata.reflection.transformation_pattern }}
                            </div>

                            <!-- Stats Footer -->
                            <div class="text-xs text-gray-400 flex justify-between items-center pt-3 border-t border-gray-100">
                                <span v-if="cluster.cluster_metadata?.signal_count_estimate">
                                    {{ cluster.cluster_metadata.signal_count_estimate }} signals
                                </span>
                                <span
                                    v-if="cluster.cluster_metadata?.reflection?.threshold_moments?.length"
                                    class="text-pink-600"
                                >
                                    {{ cluster.cluster_metadata.reflection.threshold_moments.length }} thresholds
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </Content>
</template>

<script setup>
import { onMounted } from 'vue'
import { router } from '@inertiajs/vue3'
import Hero from '@/Components/System/Hero.vue'
import Content from '@/Components/System/Content.vue'
import Icon from '@/Components/System/Icon.vue'
import { useClusters } from '@/Composables/useClusters'

const { clusters, loading, error, loadIndex } = useClusters()

onMounted(() => loadIndex())

const goTo = (ulid) => {
    router.visit(`/synthesis/${ulid}`)
}

const formatDate = (dateStr) => {
    if (!dateStr) return '—'
    const date = new Date(dateStr)
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
    })
}

const stripMarkdown = (text) => {
    if (!text) return ''
    return text
        .replace(/\*\*(.*?)\*\*/g, '$1')
        .replace(/\*(.*?)\*/g, '$1')
        .replace(/\n/g, ' ')
        .trim()
}

const pageTheme = 'synthesis'

</script>
