<template>
    <Content :theme="pageTheme">
        <Hero
            title="TRANSMISSION CLUSTERS"
            meta="CLUSTER ANALYSIS THROUGH RECURSIVE AI REFLECTION"
            subtitle="COHERENT PHASES OF A SOVEREIGN JOURNEY"
            :theme="pageTheme"
        />

        <div v-if="loading" class="py-16 text-center text-gray-400">
            Loading Clusters...
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
    router.visit(`/transmissions/clusters/${ulid}`)
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
        .replace(/\*\*(.*?)\*\*/g, '$1')  // Remove bold
        .replace(/\*(.*?)\*/g, '$1')       // Remove italic
        .replace(/\n/g, ' ')                // Replace newlines with spaces
        .trim()
}

const pageTheme = 'transmissions'
</script>
